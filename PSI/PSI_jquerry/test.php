   
<!-- HTML form -->
<form>
    <input type="text" id="name-input" placeholder="Enter your name">
    <button type="button" class="submit-btn">Submit</button>
</form>

<!-- JavaScript code -->
<script>
    $(".submit-btn").click(function () {
        var nameValue = $("#name-input").val();

        $.ajax({
            type: 'POST',
            url: 'submit.php',
            data: {name: nameValue},

          

        });
    });
</script>

<!-- PHP code in submit.php file -->
<?php
    $name = $_POST['name'];
    echo "Hello, $name!";
?>
