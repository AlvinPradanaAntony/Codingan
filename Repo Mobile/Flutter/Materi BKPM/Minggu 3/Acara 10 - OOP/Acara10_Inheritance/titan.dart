class Titan{
  int? pwPoint;
  int  get powerPoint => pwPoint!;
  
  void set powerPoint(int value){
    if(value <= 5){
      value = 5;
    } 
    pwPoint = value;
  }
}