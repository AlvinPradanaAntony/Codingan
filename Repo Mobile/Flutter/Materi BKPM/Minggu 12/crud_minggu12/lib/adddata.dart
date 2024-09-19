import'package:flutter/material.dart';
import'package:http/http.dart'as http;
import'main.dart';

class AddData extends StatefulWidget{
  @override
  _AddDataState createState() => _AddDataState();
}

class _AddDataState extends State<AddData>{
  TextEditingController controllerJudul = TextEditingController();
  TextEditingController controllerIsi = TextEditingController();

  void addData() {
  var url="http://192.168.1.3:8080/posts";
  http.post(Uri.parse(url), body: {
    "title": controllerJudul.text,
    "body": controllerIsi.text,
    });
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Tambah Data"),
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
                  child: Text("Tambah Data", style: TextStyle(color: Colors.white),),
                  color: Colors.blueAccent,
                  elevation: 6.0,
                  onPressed: (){
                    addData();
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