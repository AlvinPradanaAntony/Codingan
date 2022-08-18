let fname = 'Alvin';
let lname = 'Antony';
let age =  prompt("Masukkan umur Anda!");

// Cara Lama
// let result = fname + ' ' + lname + ' ' + 'is' + ' ' + age + ' ' + 'Year Old';
// alert(result)

// Memakai template strings
let result = `${fname} ${lname} is ${age} year old`;
alert(result);
