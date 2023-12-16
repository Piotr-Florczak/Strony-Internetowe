<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div class="box1"> 
        <form action>
            Data: <input type="date" id="data" id="data"> <br>
            Godzina:<input type="time" id="godzina"> <br>
            Waga (KG):<input type="number" id="waga"> <br>
            Puls:<input type="number" id="puls"> <br>
            Nazycenie Krwi tlenem:<input type="text" id="krew"> <br>
            Temperatura ciała:<input type="number" id="temp"> <br>
            Poziom stresu:<input type="number" min="1" max="5" id="stres"> <br>
            Liczba wypitych szklanek wody:<input type="number" id="woda"> <br>
            Liczba kroków:<input type="number" id="kroki"> <br>

            inne aktywności:

            <select name="bieganie" id="inne">
                <option value="skakanie">skakanie</option>
                <option value="jazda na rowerze">jazda na rowerze</option>
                <option value="bieganie">bieganie</option>
                <option value="wspinaczka">wspinaczka</option>
            </select>

            <button id="submit-btn" type="button">Submit</button>
        </form>
    </div>

    <div class="box" id="box">test</div>


</body>

</html>
<script>
    $("#submit-btn").click(function () {
        var dataa = $("#data").val();
        var godzina = $("#godzina").val();
        var waga = $("#waga").val();
        var puls = $("#puls").val();
        var krew = $("#krew").val();
        var temp = $("#temp").val();
        var stres = $("#stres").val();
        var woda = $("#woda").val();
        var kroki = $("#kroki").val();
        var inne = $("#inne").val();

        
        const dateObj = new Date(dataa.split('.').reverse().join('-'));
        const nowaData = dateObj.toISOString().split('T')[0];


        $.ajax({
            type: 'POST',
            url: 'test.php',
            data: 
            {
                nowaData: nowaData,
                godzina: godzina,
                waga: waga,
                puls: puls,
                krew: krew,
                temp: temp,
                stres: stres,
                woda: woda,
                kroki: kroki,
                inne: inne,
            },

            success: function (response) 
            {
                console.log(response);
                $("#box").html("<b>Odpowiedz serwera to: </b>"+response);

                //alert('wszystko ok');
            },
            error: function (jqXHR, textStatus, errorThrown) 
            {
                console.log(textStatus, errorThrown);
            }

        });
    });

</script>

<style>
    .team
{
	position: absolute;
	top: 320px; left: 7px;
}

table 
{
  border-collapse: collapse;
  width: 65%;
}

th, td 
{
  text-align: left;
  padding: 8px;
}

tr:nth-child(even){background-color: #f2f2f2}

th 
{
  background-color: #04AA6D;
  color: white;
}
    input[type=text],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=time],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=number],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=date],
    select {
        width: 100%;
        padding: 12px 20px;
        margin: 8px 0;
        display: inline-block;
        border: 1px solid #ccc;
        border-radius: 4px;
        box-sizing: border-box;
    }

    input[type=submit] {
        width: 100%;
        background-color: #4CAF50;
        color: white;
        padding: 14px 20px;
        margin: 8px 0;
        border: none;
        border-radius: 4px;
        cursor: pointer;
    }

    input[type=submit]:hover {
        background-color: #45a049;
    }

    .box1 {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        width: 30%;
        float: left;
    }
</style>