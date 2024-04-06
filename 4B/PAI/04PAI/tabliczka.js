/**
 * Dynamiczna tabliczka mnożenia .
 * @param {number} heigh - wyskosc tabelki
 * @param {number} width - szrokosc tabelki
 * @param {number} od - od jakiej wartości tabelka ma się zacząć
 * @param {number} do - do jakiej wartości tabelka ma się kończyć 
 */
tabela = (x=10, y=10,a=0,b=0) => {
    const element = document.getElementById("div");
    const szerkosc =x;
    const wyokosc = y;
    const od = a-1;
    const d0 = b-1;
    if (element) {
        let tabela = `<table>`;
        tabela += `<tr>`;
        tabela += `<th></th>`;
        for (let j = od; j < szerkosc+od; j++) {
            tabela += `<th>${j + 1}</th>`;
        }
        tabela += `</tr>`;
        for (let i = d0; i < wyokosc+d0; i++) {
            tabela += `<tr>`;
            tabela += `<th>${i + 1}</th>`;
            for (let j = od; j < szerkosc+od; j++) {
                const wynik = (i + 1) * (j + 1);
                const szarosc = Math.min(Math.floor((wynik / 150) * 255), 255);
                tabela += `<td style="background-color: rgb(${szarosc}, ${szarosc}, ${szarosc})">${wynik}</td>`;
            }
            tabela += `<th>${i + 1}</th>`;
            tabela += `</tr>`;
        }
        tabela += `<tr>`;
        tabela += `<th></th>`;
        for (let j = od; j < szerkosc+od; j++) {
            tabela += `<th>${j + 1}</th>`;
        }
        tabela += `</tr>`;
        
        console.log(tabela);
        tabela += `</table>`;
        element.innerHTML = tabela;
    }
};
