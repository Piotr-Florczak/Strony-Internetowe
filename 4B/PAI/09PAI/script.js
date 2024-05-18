window.onload = () => {
    const numbers1 = [2, 5, 7, 10, 34, 16, 879, 1, 6689, 898, 67, 5, 0, -234, 353, 1, -7, 8];
    const numbers2 = [748, 456, 133, 19, 7253, 158, 238, 71, 333, 23, 4, 9, 273, 3.1415];
    let students = ["John", "Bill", "Emma", "Stella", "Rob", "Julian",
        "Barack", "Joe", "Thomas", "Paul", "Bob", "Ted", "Ed", "Eddie", "Jane",
        "Eve", "Steve", "Julian", "Json", "Assembler", "Cobol", "Michael",
        "Justin", "Britney", "Simon", "Bart", "Albert", "Alf", "Alibaba"];
    let people = ["Adam", "Łukasz", "Ewelina", "Dorota", "Wojciech", "Jerzy",
        "Ewa", "Darek", "Michał", "Stefan", "Milena", "Łucja", "Grażyna", "Żaneta",
        "Michał", "Katarzyna", "Anna", "Monika", "Jan", "Alicja", "Joanna",
        "Zuzanna", "Krystyna", "Barbara", "Lucjan", "Małgorzata"];

    testNumbers(numbers1);
    randomizer(students);
    adder(students,"Alicja");
    sorter(students);
    sorter(people);
    
    console.table(students);
    console.table(people);

}
function testNumbers(tab) {
    let newTab = [];
    for (let i = 0; i <= tab.length; i++) {
        if (tab[i] % 2 == 0) {
            newTab.push(tab[i])
        }
    }
    newTab.sort();
    console.table(newTab.reverse());
}
function randomizer(tab)
{
   return tab[Math.floor(Math.random() * tab.length)];
}
function adder(tab,name)
{
    tab.push(name);
}
function sorter(tab)
{
    tab.sort((a,b) => a.localeCompare(b));

    for (let i = 0; i < 3; i++) {
        console.log(tab[i]);
    }
    for (let i = tab.length-1; i >= tab.length-3; i--) {
        console.log(tab[i]);
    }
}