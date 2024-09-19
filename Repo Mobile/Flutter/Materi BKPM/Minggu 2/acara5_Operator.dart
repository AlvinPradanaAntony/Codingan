void main() {
//Operator Assignment (=)
  var angka1;
  angka1 = 10;

//Operator Perbandingan
  //Equal Operator (==)
  var angka2 = 100;
  print("====================");
  print("Equal Operator (==)");
  print("====================");
  print(angka2 == 100); // true
  print(angka2 == 20); // false
  print("====================");
  print("");
  //Not Equal ( != )
  print("====================");
  print("Not Equal ( != )");
  print("====================");
  var sifat = "rajin";
  print(sifat != "malas"); // true
  print(sifat != "bandel"); //true
  print("====================");
  print("");
  //Strict Equal ( === ) 
  print("====================");
  print("Strict Equal ( ====)");
  print("====================");
  var angka3 = 8;
  print(angka3 == "8"); // false, padahal "8" adalah string.
  print(angka3 == 8); // true
  print("====================");
  print("");
  //Kurang dari & Lebih Dari ( <, >, <=, >=)
  print("====================");
  print("Kurang dari & Lebih Dari ( <, >, <=, >=)");
  print("====================");
  var number = 17;
  print( number < 20 ); // true
  print( number > 17 ); // false
  print( number >= 17 ); // true, karena terdapat sama dengan
  print( number <= 20 ); // true
  print("====================");
  print("");

//Operator Kondisional
  //OR ( || )
  print("====================");
  print("OR ( || )");
  print("====================");
  print(true || true); // true
  print(true || false); // true
  print(true || false || false); // true
  print(false || false); // false
  print("====================");
  print("");
  //AND ( && )
  print("====================");
  print("AND ( && )");
  print("====================");
  print(true && true); // true
  print(true && false); // false
  print(false && false); // false
  print(false && true && true); // false
  print(true && true && true); // true
  print("====================");
  print("");
}