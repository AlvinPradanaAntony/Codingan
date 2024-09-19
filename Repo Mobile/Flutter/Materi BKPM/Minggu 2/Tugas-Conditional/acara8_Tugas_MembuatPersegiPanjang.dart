import 'dart:io';

void main(){
  var tagarLebar = 4;
  var tagarTinggi = 8;
  for (int i = 0; i < tagarLebar; i++) {
    for (int j = 0; j <= tagarTinggi; j++) {
      stdout.write('#');
    }
    print('');
  }
  print("");
}