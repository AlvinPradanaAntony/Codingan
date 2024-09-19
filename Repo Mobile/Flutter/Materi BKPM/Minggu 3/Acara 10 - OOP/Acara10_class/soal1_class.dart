import 'dart:io';

class Segitiga{
  double? setengah, alas, tinggi;

  luasSegitiga(){
    var luasSegitiga = setengah! * alas! * tinggi!;
    return luasSegitiga;
  }
}

void main(){
  Segitiga segitiga = new Segitiga();

  segitiga.setengah = 0.5;
  segitiga.alas = 20.0;
  segitiga.tinggi = 30.0;

  double hasil = segitiga.luasSegitiga();

  print("-----------------------");
  print("     Luas Segitiga     ");
  print("-----------------------");
  print("Diketahui : ");
  print("       Alas   = ${segitiga.alas}");
  print("       Tinggi = ${segitiga.tinggi}");
  print("-----------------------");
  print("Hasil :        ${hasil}");
  print("-----------------------");
}