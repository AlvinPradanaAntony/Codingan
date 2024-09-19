import 'lingkaran.dart';

void main() {
  Lingkaran lingkaran = new Lingkaran();

  lingkaran.jariJari = 14;
  double hasil = lingkaran.luas;
  print("-----------------------");
  print("     Luas Lingkaran     ");
  print("-----------------------");
  print("Diketahui : ");
  print("     Jari-Jari   = ${lingkaran.jariJari}");
  print("-----------------------");
  print("Hasil :             ${hasil.round()}");
  print("-----------------------");
}