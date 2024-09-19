import 'dart:math';
import 'bangunDatar.dart';

class Segitiga extends BangunDatar{
  double? alas, tinggi, sisiA, sisiB, sisiC;

  @override
  double luas() {
    return 0.5 * alas! * tinggi!;
  }

  @override
  double keliling() {

    return sisiA! + sisiB! +sisiC!;
  }
}
  
  