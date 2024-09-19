import 'dart:io';

void main(){
// Ternary Operator
  print("================");
  print("Installing Dart");
  print("================");
  stdout.write("Apakah Anda ingin menginstall Dart ? (Y/N)");
  String inputKonfirmasi = stdin.readLineSync()!;
  var input = inputKonfirmasi.toUpperCase();
  if(input == "Y"){
    print("Anda akan menginstall aplikasi dart");
  } else if(input == "N"){
    print("Aborted");
  } else {
    print("Inputan Salah");
  }
  print("");
}