var gracz;
var cel;
var pozycja_cel_y= 100;
var pozycja_cel_x= 500;

var pozycja_gracza_x=0;
var pozycja_gracza_y=0;

var predkosc_gracza=8;
var szerokosc_gracza=35;

var pozycja_bullet_y=600;
var pozycja_bullet_x=0;

var min = 100;
var max = 1500;

var licznik = 0;

var stan_klawiszy=[];
stan_klawiszy["lewo"]=false;
stan_klawiszy["prawo"]=false;

function wcisnietyKlawisz(zdarzenie)
{
    if (zdarzenie.key=="d" || zdarzenie.key=="D") stan_klawiszy["lewo"]=true;
    if (zdarzenie.key=="a" || zdarzenie.key=="A") stan_klawiszy["prawo"]=true;
}

function puszczonyKlawisz(zdarzenie)
{
    if (zdarzenie.key=="d" || zdarzenie.key=="D") stan_klawiszy["lewo"]=false;
    if (zdarzenie.key=="a" || zdarzenie.key=="A") stan_klawiszy["prawo"]=false;
}

function przesungracza()
{
    //console.log(pozycja_gracza_x + "<----pozycja gracza");
    //console.log(document.body.clientWidth + "<----szerokosc ekranu")
    gracz.style.left=pozycja_gracza_x;
    gracz.style.top =pozycja_gracza_y;
    if(stan_klawiszy['lewo'])
    {
        if (pozycja_gracza_x < document.body.clientWidth-115)  pozycja_gracza_x += predkosc_gracza;
    }
    if(stan_klawiszy['prawo'])
    {
        if (pozycja_gracza_x > 0)  pozycja_gracza_x -= predkosc_gracza;
    }
    
    

}
function przesunPilke()
{
    bullet.style.top = pozycja_bullet_y;
    bullet.style.left = pozycja_bullet_x;
    pozycja_bullet_y -= 20;
    if(pozycja_bullet_y < 0)
    {
       pozycja_bullet_y = pozycja_gracza_y;
       pozycja_bullet_x = pozycja_gracza_x+20;
    } 
    //console.log(pozycja_gracza_y+ "<----pozycja bullet");
    //console.log(document.body.clientHeight + "<----wysokosc ekranu")
}
function przesuncel()
{
    cel.style.top = pozycja_cel_y;
    cel.style.left = pozycja_cel_x;
    if (pozycja_cel_y>pozycja_bullet_y && pozycja_cel_y-30 < pozycja_bullet_x)
    {
        if(pozycja_bullet_x > pozycja_cel_x-30 && pozycja_bullet_x<pozycja_cel_x+30)
        {
            pozycja_cel_x=Math.random() * (max-min)+min;
            pozycja_bullet_y = pozycja_gracza_y;
            pozycja_bullet_x = pozycja_gracza_x+6;
            document.getElementById("licznik").innerHTML = "score: " + licznik;
            licznik ++;
        }
    }
    //console.log(pozycja_bullet_y+"  bullet");
    //console.log(pozycja_cel_y+" cel");
    
}
window.onload=function() 
{
    
    gracz=document.getElementById("gracz");
    bullet=document.getElementById("bullet");
    cel=document.getElementById("cel");


    pozycja_gracza_y = document.body.clientHeight- (document.body.clientHeight * 0.20);
    szerokosc_gracza= document.body.clientWidth*0.05294;
    
   
    setInterval(przesungracza, 1000/60);
    setInterval(przesunPilke, 1000/60);
    setInterval(przesuncel, 1000/60);
    

    document.body.addEventListener("keydown",wcisnietyKlawisz);
    document.body.addEventListener("keyup", puszczonyKlawisz);


}
