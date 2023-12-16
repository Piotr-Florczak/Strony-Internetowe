/**
 * Oblicza pole prostokąta.
 *
 * @param {number} a - dzielna.
 * @param {number} [b=2] - dzielnik.
 * @returns {boolean | null} Zwraca wartość logiczną true lub false w zależności od tego czy dzielna(a) jest podzielna przez dzielnik(b) .
 * @author Piotr Florczak
 * @example
 * dzielenie(10)
 * returns true
 * @example
 * dzielenie(6,3)
 * returns true
 */
function dzielenie(a, b = 2) 
{
    var liczbaArgumentow = arguments.length;
    if (liczbaArgumentow > 2 || liczbaArgumentow < 1) {
        console.error("syntax err");
        return null;
    }
    if (b == 0 || a == 0) {
        console.error("math err");
        return null;
    }
    if (typeof a !== 'number' || typeof b !== 'number') {
        console.error("both arguemnts must be a numbers");
        return null;
    }
    if (a % b == 0) {
        return true;
    }
    else {
        return false;
    }
}

