//stałe
const wysokoscPaletki=0.4;
const przyspieszeniePilki=1.1;
const startPilki=7;
const rozrzutPilki=4;

//zmienne do obsługi piłki
var pilka; 
var pilkaX=0;
var pilkaY=0;
var pilkaPredkoscX=0.2;
var pilkaPredkoscY=7;

//zmienne do obsługi gracza 1
var gracz1; 
var gracz1Y=0;
var gracz1PredkoscY=15;

//zmienne do obsługi gracza 2
var gracz2; 
var gracz2Y=0;
var gracz2PredkoscY=15;

//zmienne przechowujące wynik
var punkty1=0;
var punkty2=0;

var stanKlawiszy=[];
stanKlawiszy["G1Gora"]=false;
stanKlawiszy["G1Dol"]=false;
stanKlawiszy["G2Gora"]=false;
stanKlawiszy["G2Dol"]=false;
stanKlawiszy["Start"]=false;

function wcisnietyKlawisz(zdarzenie) {
    if (zdarzenie.key=="w" || zdarzenie.key=="W") stanKlawiszy["G1Gora"]=true;
    if (zdarzenie.key=="s" || zdarzenie.key=="S") stanKlawiszy["G1Dol"]=true;
    if (zdarzenie.key=="ArrowUp") stanKlawiszy["G2Gora"]=true;
    if (zdarzenie.key=="ArrowDown") stanKlawiszy["G2Dol"]=true;
}

function puszczonyKlawisz(zdarzenie) {
    if (zdarzenie.key=="w" || zdarzenie.key=="W") stanKlawiszy["G1Gora"]=false;
    if (zdarzenie.key=="s" || zdarzenie.key=="S") stanKlawiszy["G1Dol"]=false;
    if (zdarzenie.key=="ArrowUp") stanKlawiszy["G2Gora"]=false;
    if (zdarzenie.key=="ArrowDown") stanKlawiszy["G2Dol"]=false;
}

window.addEventListener("resize", zmienionoWIelkoscOkna);
function zmienionoWIelkoscOkna() {
    console.log("Nowe wymiary:"+document.body.clientWidth+" x "+document.body.clientHeight);
}

//po zdobytym punkcie resetujemy piłkę
function resetujPilke() {
    //zmień zawartość div'a "wynik" na aktualny wynik
    document.getElementById("wynik").innerHTML=punkty1 + " : " + punkty2;
    //pobierz aktualną wielkość okna
    var szerokoscEkranu=document.body.clientWidth;
    var wysokoscEkranu=document.body.clientHeight;
    //przesuń piłkę na środek ekranu (połowa ekranu - połowa piłki)
    pilkaX=(szerokoscEkranu/2) - (pilka.clientHeight/2);
    pilkaY=(wysokoscEkranu/2) - (pilka.clientHeight/2);
    
    //losujemy predkosc
    pilkaPredkoscX=startPilki+(rozrzutPilki*Math.random());
    pilkaPredkoscY=startPilki+(rozrzutPilki*Math.random());

    //losujemy kierunek
    if (Math.random()>0.5) pilkaPredkoscX*= (-1);
    if (Math.random()>0.5) pilkaPredkoscY*= (-1); 

    //wyswietlanie piłki w nowym położeniu
    pilka.style.top=pilkaY;
    pilka.style.left=pilkaX;
}

function przesunPilke() {
    //przesuwamy piłkę o jej aktualnąprędkość
    pilkaX+=pilkaPredkoscX;
    pilkaY+=pilkaPredkoscY;

    //sprawdzamy odbicie od gracza 1
    if (pilkaPredkoscX<0) {
        if (pilkaX<gracz1.clientWidth) { //sprawdzamy, czy piłka leci w lewo
            if (gracz1Y<pilkaY) { //sprawdzam, czy górna granica paletki jest nad górną granicą piłki
                if (gracz1Y+gracz1.clientHeight>pilkaY+pilka.clientHeight) {//sprawdzam, czy dolna granica paletki jest pod dolnągranicą piłki
                    pilkaPredkoscX*= (-1); //odwracamy prędkość w osi X, czyli odbijamy w poziomie
                    pilkaX=gracz1.clientWidth; //przenosimy piłkę na krawędź paletki
                    pilkaPredkoscX*=przyspieszeniePilki;
                    pilkaPredkoscY*=przyspieszeniePilki;
                }
            }
        }
    }
    

    //sprawdzamy odbicie od gracza 2
    if (pilkaPredkoscX>0) { //sprawdzamy, czy piłka leci w prawo
        if (pilkaX+pilka.clientWidth>document.body.clientWidth-gracz2.clientWidth) {
            if (gracz2Y<pilkaY) { //sprawdzam, czy górna granica paletki jest nad górną granicą piłki
                if (gracz2Y+gracz2.clientHeight>pilkaY+pilka.clientHeight) {//sprawdzam, czy dolna granica paletki jest pod dolnągranicą piłki
                    pilkaPredkoscX*= (-1); //odwracamy prędkość w osi X, czyli odbijamy w poziomie
                    pilkaX=document.body.clientWidth-gracz2.clientWidth-pilka.clientWidth;
                    pilkaPredkoscX*=przyspieszeniePilki;
                    pilkaPredkoscY*=przyspieszeniePilki;
                }
            }
        }
    }

    
    
    //sprawdzamy odbicie od lewej ściany
    if (pilkaX<0) {
        punkty2++;
        resetujPilke();
    }

    //sprawdzamy odbicie od prawej ściany
    if (pilkaX>document.body.clientWidth-pilka.clientWidth) {
        punkty1++;
        resetujPilke();
    }

    //sprawdzamy odbicie od podłogi
    if (pilkaY>document.body.clientHeight-pilka.clientHeight) {
        pilkaPredkoscY*= (-1);
    }

    //sprawdzamy odbicie od sufitu
    if (pilkaY<0) {
        pilkaPredkoscY*= (-1);
    }

    //wyswietlanie piłki w nowym położeniu
    pilka.style.top=pilkaY;
    pilka.style.left=pilkaX;
    przesunGraczy();
}

function przesunGraczy() {
    if (stanKlawiszy['G1Gora']) gracz1Y-=gracz1PredkoscY;
    if (stanKlawiszy['G1Dol']) gracz1Y+=gracz1PredkoscY;
    if(gracz1Y<0) gracz1Y=0;
    if(gracz1Y>document.body.clientHeight-gracz1.clientHeight) gracz1Y=document.body.clientHeight-gracz1.clientHeight;
    gracz1.style.top=gracz1Y;

    if (stanKlawiszy['G2Gora']) gracz2Y-=gracz2PredkoscY;
    if (stanKlawiszy['G2Dol']) gracz2Y+=gracz2PredkoscY;
    if(gracz2Y<0) gracz2Y=0;
    if(gracz2Y>document.body.clientHeight-gracz2.clientHeight) gracz2Y=document.body.clientHeight-gracz2.clientHeight;
    gracz2.style.top=gracz2Y;
}


window.onload=function() {
    //przypisz element piłka do zmiennej pilka
    pilka=document.getElementById("pilka");

    //przypisz element gracz1 do zmiennej gracz1
    gracz1=document.getElementById("gracz1");
    gracz1Y=document.body.clientHeight*wysokoscPaletki;

    //przypisz element gracz2 do zmiennej gracz2
    gracz2=document.getElementById("gracz2");
    gracz2Y=document.body.clientHeight*wysokoscPaletki;


    //wylosuj nową prędkość i kierunek piłki
    resetujPilke();

    //wykonuj funkcję "przesunPilke" 60 razy na sekundę
    setInterval(przesunPilke, 1000/60);

    //do obiektu "body" dopisujemy funkcję nasłuchującą
    //czekam na zdarzenie typu "keypress", czyli wciśnięcie dowolnego klawisza
    //jeśli zdarzenie się pojawi, wywołujemy funkcję wcisnietyKlawisz
    document.body.addEventListener("keydown", wcisnietyKlawisz);
    document.body.addEventListener("keyup", puszczonyKlawisz);
}
