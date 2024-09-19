import 'dart:math';

class Lingkaran{
  double? r;

  void set jariJari(double value){
    if(value < 0){
      value *= -1;
    } 
    r = value;
  }

  double get jariJari{
    return r!;
  }

  double get luas => pi * pow(r!, 2);

}