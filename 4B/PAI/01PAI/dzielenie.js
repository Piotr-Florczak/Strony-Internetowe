function dzielenie(a, b = 2) {
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

// dzielenie ([arguemnt],[arguemnt(2)])
// funcja zwraca podzielnośc pierwszego arguekntu przez drugi