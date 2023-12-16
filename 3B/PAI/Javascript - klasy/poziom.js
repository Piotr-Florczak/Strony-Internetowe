class Poziom {
    constructor(wysokoscPoziomu, szerkkoscPoziomu, obrazekTla, nowyX, nowyY) {
        this.x=nowyX;
        this.y=nowyY;
        this.wysokosc=wysokoscPoziomu;
        this.szerokosc=szerkkoscPoziomu;

        //obraz z tłem
        //rozmiary obrazka to this.narutalWidth i this.naturalHeight
        this.tlo=new Image();
        this.tlo.src=obrazekTla;
        
        this.podloga=2500;
    }

    narysuj() {
        kontekst.drawImage(
            this.tlo, //obrazek
            0, //x lewego gónego rogu na obrazie
            0,   //y lewego gónego rogu na obrazie
            this.tlo.naturalWidth, //szerokosc klatki na obrazie
            this.tlo.naturalHeight, //wysokosc klatki na obrazie
            this.x-kamera.x,  //x na ekranie do wyświetlenia
            this.y-kamera.y,  //y na ekranie do wyświetlenia
            this.tlo.naturalWidth,  //szerokosc na ekranie do wyświetlenia
            this.tlo.naturalHeight  //wysokosc na ekranie do wyświetlenia
        );

        console.log(this.tlo.naturalHeight);
    }
}