import 'dart:io';
void main(List<String> args) {
  print("Masukan Username: ");
  String inputTextUsername = stdin.readLineSync()!;
  print("Masukan Password: ");
  String inputTextPass = stdin.readLineSync()!;
  print("=========================================");
  print("Username Anda adalah: ${inputTextUsername}");
  print("Password Anda adalah: ${inputTextPass}");
} 