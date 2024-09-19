void main(){
  var tgl = 09;
  var bln = 05;
  var thn = 2002;

  if (tgl > 31) {
    print("Tanggal yang Anda masukkan tidak Valid");
  } else if (bln > 12){
    print("Bulan yang Anda masukkan tidak Valid");
  }else if (thn > 2100){
    print("Bulan yang Anda masukkan tidak Valid");
  }else {
    switch (bln) {
      case 1: { print("${tgl.toString()} Januari ${thn.toString()}"); break; }
      case 2: { print("${tgl.toString()} Februari ${thn.toString()}"); break; }
      case 3: { print("${tgl.toString()} Maret ${thn.toString()}"); break; }
      case 4: { print("${tgl.toString()} April ${thn.toString()}"); break; }
      case 5: { print("${tgl.toString()} Mei ${thn.toString()}"); break; }
      case 6: { print("${tgl.toString()} Juni ${thn.toString()}"); break; }
      case 7: { print("${tgl.toString()} Juli ${thn.toString()}"); break; }
      case 8: { print("${tgl.toString()} Agustus ${thn.toString()}"); break; }
      case 9: { print("${tgl.toString()} September ${thn.toString()}"); break; }
      case 10: { print("${tgl.toString()} Oktober ${thn.toString()}"); break; }
      case 11: { print("${tgl.toString()} November ${thn.toString()}"); break; }
      case 12: { print("${tgl.toString()} Desember ${thn.toString()}"); break; }
    }
  }
}