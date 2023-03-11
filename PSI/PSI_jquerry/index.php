<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

</head>

<body>
    <div>
        <form action>
            Data: <input type="date" id="data"> <br>
            Godzina:<input type="time"> <br>
            Waga (KG):<input type="number"> <br>
            Puls:<input type="number"> <br>
            Nazycenie Krwi tlenem:<input type="text"> <br>
            Temperatura ciała:<input type="number"> <br>
            Poziom stresu:<input type="number" min="1" max="5"> <br>
            Liczba wypitych szklanek wody:<input type="number"> <br>
            Liczba kroków:<input type="number"> <br>

            inne aktywności:

            <select name="bieganie">
                <option value="skakanie">skakanie</option>
                <option value="jazda na rowerze">jazda na rowerze</option>
                <option value="bieganie">bieganie</option>
                <option value="wspinaczka">wspinaczka</option>
            </select>

            <button id="submit-btn" type="button">Submit</button>
        </form>
    </div>

</body>

</html>
<script>
    $(".submit-btn").click(function () {
        var value = "test1";

        $.ajax({
            type: 'POST',
            url: 'index.php',
            data: {name: value},

            success: function (response) 
            {
                alert('wszystko ok');
            },
            error: function (jqXHR, textStatus, errorThrown) 
            {
                console.log(textStatus, errorThrown);
            }

        });
    });

</script>

<?php
$name = $_POST['name'];
?>

<style>
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
        s width: 100%;
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

    div {
        border-radius: 5px;
        background-color: #f2f2f2;
        padding: 20px;
        width: 30%;
    }
</style>