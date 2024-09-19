import 'employee.dart';

void main (){
  Employee employee = new Employee( "E41200142", 
                                    "Alvin Pradana Antony", 
                                    "Teknik Informatika");
  print("---------------------------------------");
  print("    Perkenalan Diri with Constructor   ");
  print("---------------------------------------");                                  
  print("NIM   : ${employee.id}");
  print("Nama  : ${employee.name}");
  print("Prodi : ${employee.departement}");      
  print("---------------------------------------");                                
}