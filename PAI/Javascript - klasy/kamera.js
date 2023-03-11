class Kamera {
    constructor() {
        this.szerokosc=window.innerWidth;   
        this.wysokosc=window.innerHeight;
        this.x=0;
        this.y=0;
    }

    ruszKamera(ruchX, ruchY) {
        this.x+=ruchX;
        this.y+=ruchY;
    }

    teleportujKamere(nowyX, nowyY) {
        this.x=nowyX;
        this.y=nowyY;
    }

    aktualizuj() {
        this.szerokosc=window.innerWidth;
        this.wysokosc=window.innerHeight; 
    }
}