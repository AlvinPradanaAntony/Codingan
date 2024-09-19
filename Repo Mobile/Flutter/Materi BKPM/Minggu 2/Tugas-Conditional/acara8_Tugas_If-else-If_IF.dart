import 'dart:io';

void main(){
  print("========================================");
  print("""         Dunia Game Werewolf        """);
  print("========================================");
  stdout.write('Masukan nama kamu: ');
  var nama = stdin.readLineSync();
  stdout.write('Masukan peran kamu: ');
  var peran = stdin.readLineSync();
  print("========================================");

  if (nama == "" && peran == "") {
    print('Nama dan Peran harus diisi!');
  } else if(nama != "" && peran == ""){
    print('Pilih Peranmu untuk memulai game');
  } else if(nama == "" && peran != ""){
    print('Nama harus diisi!');
  } else if (nama == 'Jane' && peran == 'Penyihir') {
    print("Selamat datang di Dunia Werewolf, Jane");
    print("Halo Penyihir Jane, kamu dapat melihat siapa yang menjadi werewolf!");
  } else if (nama == 'Jenita' && peran == 'Guard') {
    print("Selamat datang di Dunia Werewolf, Jenita");
    print("Halo Guard Jenita, kamu dapat melihat siapa yang menjadi werewolf!");
  } else if (nama == 'Junaedi' && peran == 'Werewolf') {
    print("Selamat datang di Dunia Werewolf, Junaedi");
    print("Halo Werewolf Junaedi, kamu dapat melihat siapa yang menjadi werewolf!");
  } else {
    print("Nama dan peran yang Anda masuki tidak tersedia dalam Dunia Werewolf");
    }
  print("");
}
