void main (){
// Kondisional Bersarang
  var minimarketStatusN = "open";
  var telur = "soldout";
  var buah = "soldout";
  if (minimarketStatusN == "open") {
    print("saya akan membeli telur dan buah");
    if (telur == "soldout" || buah == "soldout") {
      print("belanjaan saya tidak lengkap");
    } else if (telur == "soldout") {
      print("telur habis");
    } else if (buah == "soldout") {
      print("buah habis");
    }
  } else {
    print("minimarket tutup, saya pulang lagi");
  }  
}