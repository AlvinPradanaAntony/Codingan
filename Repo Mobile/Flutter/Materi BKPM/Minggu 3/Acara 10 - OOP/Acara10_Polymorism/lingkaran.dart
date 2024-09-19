import 'dart:math';
import 'bangunDatar.dart';

class Lingkaran extends BangunDatar{
  double? r;

  void set jariJari(double value){
    if(value < 0){
      value *= -1;
    } 
    r = value;
  }

  @override
  double luas(){
    return pi*r!*r!;
  }

  @override
  double keliling(){
    return 2*pi*r!;
  }

}