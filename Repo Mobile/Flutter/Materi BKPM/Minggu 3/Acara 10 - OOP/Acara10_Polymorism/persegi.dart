import 'dart:math';
import 'bangunDatar.dart';

class Persegi extends BangunDatar{
  double? sisi;

  @override
  double luas() {
    return sisi! * sisi!;
  }

  @override
  double keliling() {
    return 4 * sisi!;
  }

}
  
  