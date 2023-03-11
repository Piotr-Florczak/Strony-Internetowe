class Gracz {
    constructor(nowyX, nowyY, nowaMasa, obraz, nowaSkala) {
        this.masa=nowaMasa;
        this.skala=nowaSkala;
        this.tarcie=0.9;
        this.oporPowietrza=0.95;

        //siła przycisku
        this.silaRuchu=1.5;
        this.silaSkoku=23.7;
        
        //pozycja
        this.x=nowyX;
        this.y=nowyY;

        //prędkość
        this.vX=0;
        this.vY=0;

        //przyspieszenie
        this.aX=0;
        this.aY=0;

        //siły
        this.fX=0;
        this.fY=0;

        //obraz z klatkami
        this.spritesheet=new Image();
        this.spritesheet.src=obraz;

        this.szerokoscKlatki=128;
        this.wysokoscKlatki=128;
        this.aktualnaKlatka=0;
        this.aktualnaAnimacja=0;
        this.limitKlatek=0;

        //stan przyciskó sterowania
        this.sterowanie=[];
        this.sterowanie['lewo']=false;
        this.sterowanie['prawo']=false;
        this.sterowanie['skok']=false;

        //hitbox (Lewo, Prawo, Góra, Dół)
        this.hitboxL=this.x;
        this.hitboxP=this.x+this.szerokoscKlatki;
        this.hitboxG=this.y;
        this.hitboxD=this.y+this.wysokoscKlatki;

        //kolizje (Lewo, Prawo, Góra, Dół)
        this.kolizjaL=false;
        this.kolizjaP=false;
        this.kolizjaG=false;
        this.kolizjaD=false;
    }

    klatka() {
        //resetujemy siły
        this.fX=0;
        this.fY=0;
        //dodajemy grawitację w pionie
        this.dodajSile(0,grawitacja);
        //zastosuj sterowanie
        this.rusz();
        this.obliczPrzyspieszenie();
        this.obliczPredkosc();
        this.nalozTarcie();
        this.obliczPozycje();
        this.narysuj();
        this.debug();
    }

    odswiezHitbox() {
        //hitbox
        this.hitboxL=this.x;  //lewa krawędź
        this.hitboxP=this.x+this.szerokoscKlatki;  //prawa krawędź = lewa + szerokość
        this.hitboxG=this.y;  //górna krawędź
        this.hitboxD=this.y+this.wysokoscKlatki;  //dolna grawędź = górna + wysokość
    }

    narysuj() {
        if (this.vX<0)  //jeżeli prędkość jest ujemna, poruszamy sięw lewo
            kontekst.scale(-1, 1);   //obróć układ współrzędnych (odwróć iksy)
        let pozycjaNaEkranie=this.x;  //domyślna pozycja na nieobróconym ekranie
        if (this.vX<0) //jeżeli prędkość jest ujemna, poruszamy sięw lewo
            //przesuwamy pingwina w wartości ujemne (0-x)
            //odwróciły sięiksy, więc teraz x oznacza prawą krawędź
            //odejmujemy jego szerokość, żeby obliczyć lewą krawędź po obróceniu
            pozycjaNaEkranie=this.x-576;
        kontekst.drawImage(
            this.spritesheet, //obrazek
            this.aktualnaKlatka*this.szerokoscKlatki, //x lewego gónego rogu na obrazie
            this.aktualnaAnimacja*this.wysokoscKlatki,   //y lewego gónego rogu na obrazie
            this.szerokoscKlatki, //szerokosc klatki na obrazie
            this.wysokoscKlatki, //wysokosc klatki na obrazie
            pozycjaNaEkranie-kamera.x,  //x na ekranie do wyświetlenia
            this.y-kamera.y,  //y na ekranie do wyświetlenia
            this.szerokoscKlatki*this.skala,  //szerokosc na ekranie do wyświetlenia
            this.wysokoscKlatki*this.skala  //wysokosc na ekranie do wyświetlenia
        );
        this.aktualnaKlatka++; //przejdź do kolejnej klatki na obrazie
        if (this.aktualnaKlatka>this.limitKlatek) this.aktualnaKlatka=0;
        if (this.vX<0) kontekst.scale(-1, 1);  //odwracamy z powrotem ukłąd współrzędnych
    }

    zmienAnimacje(animacja) {
        /*
            this.aktualnaAnimacja to nr wiersza, w któym znajdują się
            odpowiednie klatki w obrazie z animacją
        */

        //chodzenie
        if (animacja=='idz' && this.aktualnaAnimacja!=0) {
            if (this.kolizjaD) {
                this.aktualnaAnimacja=0;
                this.limitKlatek=8;
                this.aktualnaKlatka=0;
            }
        }
        //skakanie
        if (animacja=='skok') {
            this.aktualnaAnimacja=9;
            this.limitKlatek=8;
            this.aktualnaKlatka=0;
        }
        //chodzenie
        if (animacja=='stoj') {
            this.aktualnaAnimacja=7;
            this.limitKlatek=10;
            this.aktualnaKlatka=0;
        }
    }

    rusz() {
        if (this.sterowanie['lewo']) {
            this.dodajSile(-this.silaRuchu,0);
            this.zmienAnimacje('idz');
        }
        
        if (this.sterowanie['prawo']) {
            this.dodajSile(this.silaRuchu,0);
            this.zmienAnimacje('idz');
        }
        if (this.sterowanie['skok'] && this.kolizjaD) {
            this.dodajSile(0,-this.silaSkoku);
            this.zmienAnimacje('skok');
        }

        if (this.kolizjaD && this.aktualnaAnimacja==9) {
            if (!this.sterowanie['lewo'] && !this.sterowanie['prawo']) {
                this.zmienAnimacje('idz');
            }
        }
    }

    dodajSile(silaX, silaY) {
        this.fX+=silaX;
        this.fY+=silaY;
    }

    obliczPrzyspieszenie() {
        // prawo Njutona F=ma  czyli a = F/m
        this.aX=this.fX/this.masa;
        this.aY=this.fY/this.masa;
    }

    obliczPredkosc() {
        this.vX+=this.aX;
        this.vY+=this.aY;

        //zerowanie, jeżeli poruszamy się wolniej, niż 0.3 px
        if (!this.sterowanie['lewo'] && !this.sterowanie['prawo']) {
            if (Math.abs(this.vX)<0.3) this.vX=0;
            if (Math.abs(this.vY)<0.3) this.vY=0;
        }
        
    }

    nalozTarcie() {
        if (this.kolizjaD) {
            this.vX*=this.tarcie;
        } else {
            this.vX*=this.oporPowietrza;
        }
    }

    obliczPozycje() {
        this.x+=this.vX;
        this.y+=this.vY;
        this.odswiezHitbox();

        //kolizja ze spodem ekranu
        if (this.hitboxD>poziom.podloga) {
            this.vY=0;  //resetujemy prędkość w pionie
            this.y=poziom.podloga-this.wysokoscKlatki; //ustawiamy pingwina na dolnej krawędzi
            this.odswiezHitbox();  //przesunęliśmy, więc hitbox też musimy przesunąć
            this.kolizjaD=true;  //dotykamy podłogi
            if (this.vX==0) this.zmienAnimacje('stoj');  //zmieniamy animację
        } else {
            this.kolizjaD=false;
        }
        kamera.ruszKamera(this.vX, this.vY);
    }

    debug() {
        var tekst="";

        tekst+="Sterowanie:<br>";
        tekst+="Lewo: "+this.sterowanie['lewo']+"<br>";
        tekst+="Prawo: "+this.sterowanie['prawo']+"<br>";
        tekst+="Skok: "+this.sterowanie['skok']+"<br>";

        tekst+="Ruch:<br>";
        tekst+="X: "+this.x+"<br>";
        tekst+="Y: "+this.y+"<br>";
        tekst+="vX: "+this.vX+"<br>";
        tekst+="vY: "+this.vY+"<br>";
        tekst+="aX: "+this.aX+"<br>";
        tekst+="aY: "+this.aY+"<br>";

        tekst+="<br>Hitbox:<br>";
        tekst+="L: "+this.hitboxL+"<br>";
        tekst+="P: "+this.hitboxP+"<br>";
        tekst+="G: "+this.hitboxG+"<br>";
        tekst+="D: "+this.hitboxD+"<br>";
        debugBox.innerHTML=tekst;

        tekst+="<br>Animacja:<br>";
        tekst+="Klatka: "+this.aktualnaKlatka+"<br>";
        tekst+="Animacja: "+this.aktualnaAnimacja+"<br>";
        tekst+="Limit: "+this.limitKlatek+"<br>";

        debugBox.innerHTML=tekst;
    }


}