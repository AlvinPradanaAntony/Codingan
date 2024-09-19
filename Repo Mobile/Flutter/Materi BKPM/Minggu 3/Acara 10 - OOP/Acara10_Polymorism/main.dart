import 'lingkaran.dart';
import 'persegi.dart';
import 'segitiga.dart';
import 'bangunDatar.dart';

void main() {
  BangunDatar bangunDatar = new BangunDatar();
  Lingkaran lingkaran = new Lingkaran();
  lingkaran.jariJari = 14;

  Persegi persegi = new Persegi();
  persegi.sisi = 10;
  
  Segitiga segitiga = new Segitiga();
  segitiga.alas=5;
  segitiga.tinggi=6;
  segitiga.sisiA=12;
  segitiga.sisiB=8;
  segitiga.sisiC=5;

  bangunDatar.luas();
  print("Luas Lingkaran: ${lingkaran.luas().round()}");
  print("Luas Persegi: ${persegi.luas().round()}");
  print("Luas Segitiga: ${segitiga.luas().round()}\n");

  bangunDatar.keliling();
  print("Keliling Lingkaran: ${lingkaran.keliling().round()}");
  print("Keliling Persegi: ${persegi.keliling().round()}");
  print("Keliling Segitiga: ${segitiga.keliling().round()}");
}  