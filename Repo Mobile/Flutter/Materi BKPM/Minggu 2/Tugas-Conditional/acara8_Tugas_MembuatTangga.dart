import 'dart:io';

void main(){
  var tagar = 7;
  for (int i = 0; i < tagar; i++) {
    for (int j = 0; j <= i; j++) {
      stdout.write('#');
    }
    print('');
  }
  print("");
}