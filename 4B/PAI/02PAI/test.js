function test() {
  var testCases = [
    { args: [4, 2], expected: true },
    { args: [5, 2], expected: false },
    { args: [4], expected: true },
    { args: [3], expected: false },
    { args: [1000000000000, 100000000000], expected: true },
    { args: [1000000000001, 100000000000], expected: false },
    { args: [5.55555555555, 2], expected: false },
    { args: [10.0, 2.5], expected: true },
    { args: [3.33333333333, 1.11111111111], expected: true },
    { args: [4, 0], expected: null },
    { args: [0, 4], expected: null },
    { args: ["4", 2], expected: null },
    { args: [4, "2"], expected: null },
    { args: [4, 2, 1], expected: null },
    { args: [], expected: null },
  ];

  let i = 0;
  let passedTest = 0;
  let failedTest = 0;

  while (i < testCases.length) {
    const testCase = testCases[i];
    const actual = dzielenie(...testCase.args);
    console.assert(
      actual === testCase.expected,
      `Test ${i + 1} spodziewano sie  ${
        testCase.expected
      }, otrzymano ${actual}, dla argumentow ${testCase.args}`
    );
    if (actual === testCase.expected) {
      passedTest++;
    } else {
      failedTest++;
    }
    i++;
  }
  let procent = passedTest/testCases.length * 100;
  console.log(`Zdane testy: ${passedTest}/${testCases.length} procent zdanych testów: ${procent}%`);
  
  // //Podstawowe dzielenie - sprawdzenie, czy funkcja poprawnie identyfikuje podzielność:
  //     console.assert(dzielenie(4, 2) === true, "4 jest podzielne przez 2");
  //     console.assert(dzielenie(5, 2) === false, "5 nie jest podzielne przez 2");

  // //Dzielenie przez domyślną wartość - testowanie, gdy nie podano drugiego argumentu (domyślnie równego 2):
  //     console.assert(dzielenie(4) === true, "4 jest podzielne przez 2 (domyślnie)");
  //     console.assert(dzielenie(3) === false, "3 nie jest podzielne przez 2 (domyślnie)");

  // //Nieprawidłowa liczba argumentów - sprawdzenie reakcji na zbyt wiele lub za mało argumentów:
  //     console.assert(dzielenie(4, 2, 1) === null, "Powinien pojawić się błąd składni przy 3 argumentach");
  //     console.assert(dzielenie() === null, "Powinien pojawić się błąd składni przy braku argumentów");

  // //Dzielenie przez zero - upewnienie się, że funkcja obsługuje dzielenie przez zero:
  //     console.assert(dzielenie(4, 0) === null, "Dzielenie przez 0 powinno zwrócić błąd");
  //     console.assert(dzielenie(0, 4) === null, "Dzielenie 0 przez cokolwiek powinno zwrócić błąd");

  // //Niepoprawne typy danych - testowanie reakcji na argumenty, które nie są liczbami:
  //     console.assert(dzielenie("4", 2) === null, "Argument nie będący liczbą powinien zwrócić błąd");
  //     console.assert(dzielenie(4, "2") === null, "Argument nie będący liczbą powinien zwrócić błąd");

  // //Bardzo duże liczby - testowanie zachowania funkcji przy dużych wartościach:
  //     console.assert(dzielenie(1000000000000, 100000000000) === true, "1000000000000 jest podzielne przez 100000000000");
  //     console.assert(dzielenie(1000000000001, 100000000000) === false, "1000000000001 nie jest podzielne przez 100000000000");

  // //Liczby z dużą dokładnością po przecinku - sprawdzenie, jak funkcja radzi sobie z liczbami zmiennoprzecinkowymi:
  // console.assert(dzielenie(5.55555555555, 2) === false, "5.55555555555 nie jest podzielne przez 2");
  // console.assert(dzielenie(10.0, 2.5) === true, "10.0 jest podzielne przez 2.5");
  // console.assert(dzielenie(3.33333333333, 1.11111111111) === true, "3.33333333333 jest przybliżenie podzielne przez 1.11111111111");
}
