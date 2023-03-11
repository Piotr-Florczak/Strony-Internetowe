   
    $(document).ready(function () {
        $('#submit-btn').click(function () {

            var name = "Piotr";
            $.ajax({
                url: "index.php?value="+name,
                method : "POST",
                success: function (response) {
                    alert('Data submitted successfully!');
                },
                error: function (jqXHR, textStatus, errorThrown) {
                    console.log(textStatus, errorThrown);
                }
            });
        });
    });