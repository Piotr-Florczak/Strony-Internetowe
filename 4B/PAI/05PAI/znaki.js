window.onload = () => {


  


  document.addEventListener("click", function (event) {
    var element = event.target;

    if (element.value !== undefined) {
      element.addEventListener("input", function () {
        console.log("Maksymalna długość: ", element.maxLength);
        console.log("Aktualna liczba znaków: ", element.value.length);
        var prefix = 'Div';
        var logInput = document.getElementById(prefix+element.id);
        logInput.innerHTML = element.maxLength + '/' + element.value.length;
      });
    }
  });
};
