void main(List<String> args) async{
  var h = Human();

  print("Luffy");
  print("Zoro");
  print("Killer");

  await h.getDataAsync();
  print(h.name);

}

class Human{
  String name = "Nama Character One Piece";
  Future<void>getDataAsync() async{
    await Future.delayed(Duration(seconds: 3));
    name = "Hilmy";
    print("Get data [done]");
  }

}