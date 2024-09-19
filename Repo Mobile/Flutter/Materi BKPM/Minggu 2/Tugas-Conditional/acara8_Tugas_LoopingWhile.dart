void main(){
  var text = "I Love Coding";
  var text2 = "I will become a mobile developer ";
  int i = 1;
  print("LOOPING PERTAMA");
  while(i <= 20) { 
    if(i % 2 == 0){
      print ("${i} - ${text}"); 
    }
    i++;
  }
  print("LOOPING KEDUA");
  while(i > 0) { 
    if(i % 2 == 0){
      print ("${i} - ${text2}");
    }
    i--;
  }
  print("");
}