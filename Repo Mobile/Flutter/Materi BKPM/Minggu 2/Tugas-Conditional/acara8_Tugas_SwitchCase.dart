import 'dart:io';

void main(){
  print("================");
  print("Quotes Note");
  print("================");
  print("Pilih hari dengan angka (1 - 7):");
  print("1. Senin");
  print("2. Selasa");
  print("3. Rabu");
  print("4. Kamis");
  print("5. Jumat");
  print("6. Sabtu");
  print("7. Minggu");
  print("================");
  var inputKonfirmasi = stdin.readLineSync();
  var input = num.parse('${inputKonfirmasi}');
  print("================");
  stdout.write("Quotes : ");
  switch(input) {
  case 1: { print('Segala sesuatu memiliki kesudahan, yang sudah berakhir biarlah berlalu dan yakinlah semua akan'); break; }
  case 2: { print('Setiap detik sangatlah berharga karena waktu mengetahui banyak hal, termasuk rahasia hati.'); break; }
  case 3: { print('Jika kamu tak menemukan buku yang kamu cari di rak, maka tulislah sendiri.'); break; }
  case 4: { print('Jika hatimu banyak merasakan sakit, maka belajarlah dari rasa sakit itu untuk tidak memberikan rasa sakit pada orang lain.'); break; }
  case 5: { print('Hidup tak selamanya tentang pacar'); break; }
  case 6: { print('Rumah bukan hanya sebuah tempat, tetapi itu adalah perasaan.'); break; }
  case 7: { print('Hanya seseorang yang takut yang bisa bertindak berani. Tanpa rasa takut itu tidak ada apapun yang bisa disebut berani.'); break; }
  default: { print('Kata Kunci yang Anda masukan Salah'); }}
  print("");
}