import'package:flutter/material.dart';
import'package:http/http.dart'as http;
import'main.dart';

class EditData extends StatefulWidget{
  final List list;
  final int index;

  EditData({required this.list, required this.index, id});
  @override
  _EditDataState createState() => _EditDataState();
}

class _EditDataState extends State<EditData>{
  TextEditingController controllerJudul = TextEditingController();
  TextEditingController controllerIsi = TextEditingController();

  // void editData() {
  // var url="http://192.168.1.3:8080/posts";
  // http.post(Uri.parse(url), body: {
  //   "title": controllerJudul.text,
  //   "body": controllerIsi.text,
  //   });
  // }

  void editData()async{
  http.put(
      Uri.parse('http://192.168.1.3:8080/posts/' + widget.list[widget.index]['id'].toString()),
      headers: {
        'Accept':'application/json',
      },
      body: {
        "title": controllerJudul.text,
        "body": controllerIsi.text,
      }).then((response){
    print('Response status:${response.statusCode}');
    print('Response body:${response.body}');
  });
}

  @override
  void initState() {
    controllerJudul.text = widget.list[widget.index]['title'];
    controllerIsi.text = widget.list[widget.index]['body'];
    super.initState();
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Edit Data"),
      ),
      body: Padding(
        padding: const EdgeInsets.all(10.0),
        child: ListView(
          children: <Widget>[
            Column(
              children: [
                TextField(
                  controller: controllerJudul,
                  decoration: InputDecoration(
                    hintText: "Judul",
                    labelText: "Judul",
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(14.0)
                    )
                  ),
                ),
                const SizedBox(height: 10.0),
                TextField(
                  controller: controllerIsi,
                  decoration: InputDecoration(
                    hintText: "Isi",
                    labelText: "Isi",
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(14.0)
                    )
                  ),
                ),
                const SizedBox(height: 25.0),
                RaisedButton(
                  child: Text("Simpan Data", style: TextStyle(color: Colors.white),),
                  color: Colors.blueAccent,
                  elevation: 6.0,
                  onPressed: (){
                    editData();
                    Navigator.of(context).push(
                      MaterialPageRoute(
                        builder: (BuildContext context)=> MyApp()
                      )
                    );
                  },
                )
              ],
            )
          ],
        ),
      ),
    );
  }
}
