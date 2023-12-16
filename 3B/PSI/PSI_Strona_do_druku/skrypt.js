var a,b,Name;
function kiedy_zaznaczono_tak(val)
{
        var x = document.getElementById("display");
        if (val==1)
        {
                x.style.display = "block";
                console.log("tak");
        }

                
        else 
        {
                x.style.display = "none";
                console.log("nie");
        }
                
}

window.onload=zaladuj;
function zaladuj() 
{
        kiedy_zaznaczono_tak();
        
}
function drukuj()
{
        // zczytuje wartości z formularza 
        a = document.getElementById("input_a").value;
        b = document.getElementById("input_b").value;
        Name = document.getElementById("input_name").value;

        // liczy długość imienia
        var lenght = Name.length;
        console.log(lenght);

        // liczy pole działki
        let c = a*b;
        document.getElementById("rozmiar_pola").innerHTML = c;


        var imie = document.forms["Form"]["imie"].value;
        var nazwisko = document.forms["Form"]["nazwisko"].value;
        var email = document.forms["Form"]["e-mail"].value;
        var ZIP = document.forms["Form"]["ZIP"].value;


        // sprawda poprawnosc formularza 
        if(imie==null || imie=="",nazwisko==null || nazwisko=="",email==null || email=="",ZIP==null || ZIP=="") //sprawdza czy wszystkie pola są wypełnione
        {
                alert("Wypełnij poprawnie");
                if(lenght < 2)                                                                                 // sprawdcza czy długość imienia jest większa od 3
                {
                        alert("Wypełnij poprawnie(imie powinno się składać z conajmniej 3 liter)");
                }
        }
        else
        {       
                window.print();
        }
       


}
// Poprawia składnie kodu pocztowego
$(document).on('keyup', '.postalcode', function(e){
        var code = $(this).val();
        var key = Event.keyCode || Event.charCode;

        if($(this).val().length == 2){
                 if( key == 8 || key == 46 ){
                 }
                 else{
                        $(this).val(code+'-'); 
                 }						
        }
        if($(this).val().indexOf('--') !== -1){
                $(this).val(code.replace('--','-'));					
        }
});
