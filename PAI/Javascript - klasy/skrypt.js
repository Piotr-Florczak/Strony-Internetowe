var plotno;
var kontekst;

var debugBox;

var obrazekZPingwinami;
/* każda klatka pingwina na obrazku ma rozmiar 128x128 */
var wysokoscKlatki=128;
var szerokoscKlatki=128;
var nrKlatki=0;

var gracze=[];
var poziom;
var kamera;

var grawitacja=2;

window.onload=zaladuj;

function zaladuj() {
    plotno=document.getElementById('mojePlotno');
    kontekst=plotno.getContext('2d');
    debugBox=document.getElementById("debug");
    kamera=new Kamera();
    zmianaRozmiaruOkna();
    window.addEventListener("resize", zmianaRozmiaruOkna);
    window.addEventListener("keydown", wcisnieciePrzycisku);
    window.addEventListener("keyup", puszczeniePrzycisku);

    gracze[0]=new Gracz(200,300, 0.5, "pingwin.png" ,1);
    poziom=new Poziom(10000,3000, "tlo.jpg", 100, 1500); 
    setInterval(klatka,20);
    
}

function klatka() {
    kontekst.clearRect(0,0,plotno.width, plotno.height);
    poziom.narysuj();
    tanczPingwinem();
}

function zmianaRozmiaruOkna() {
    plotno.width=document.body.clientWidth;
    plotno.height=document.body.clientHeight;
    kamera.aktualizuj();
}

function tanczPingwinem() {
    //obrazek, lewy górny róg na obrazku (0,0), wysokość na obrazku (128x150), lewy górny róg na płótnie (60,200), szerokość i wysokość na płórnie (256x300)
    for (let i=0; i<gracze.length; i++) {
        gracze[i].klatka();
    }
}

function wcisnieciePrzycisku(zdarzenie) {
    if (zdarzenie.key=="ArrowLeft") gracze[0].sterowanie["lewo"]=true;
    if (zdarzenie.key=="ArrowRight") gracze[0].sterowanie["prawo"]=true;
    if (zdarzenie.key==" ") gracze[0].sterowanie["skok"]=true;
}

function puszczeniePrzycisku(zdarzenie) {
    if (zdarzenie.key=="ArrowLeft") gracze[0].sterowanie["lewo"]=false;
    if (zdarzenie.key=="ArrowRight") gracze[0].sterowanie["prawo"]=false;
    if (zdarzenie.key==" ") gracze[0].sterowanie["skok"]=false;
}