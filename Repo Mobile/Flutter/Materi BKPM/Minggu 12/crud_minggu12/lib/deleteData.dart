import 'package:flutter/material.dart';
import 'package:http/http.dart' as http;
import 'package:crud_minggu12/editdata.dart';
import 'main.dart';

class Detail extends StatefulWidget {
  final List list;
  final int index;

  Detail({required this.list, required this.index, id});
  @override
  _DetailState createState() => _DetailState();
}

class _DetailState extends State<Detail> {
  TextEditingController controllerJudul = TextEditingController();
  TextEditingController controllerIsi = TextEditingController();

  void deleteData() {
    var url = 'http://192.168.1.3:8080/posts/';
    http.delete(Uri.parse(url + widget.list[widget.index]['id'].toString()),
        body: {
          'id': widget.list[widget.index]['id'].toString()
        }).then((response) {
      print('Response status: ${response.statusCode}');
      print('Response body: ${response.body}');
    });
  }

  void confirm() {
    showDialog(
        context: context,
        builder: (BuildContext context) {
          return Dialog(
            shape: RoundedRectangleBorder(
                borderRadius: BorderRadius.circular(20.0)), //this right here
            child: Container(
              height: 125,
              child: Padding(
                padding: const EdgeInsets.all(12.0),
                child: Column(
                  mainAxisAlignment: MainAxisAlignment.start,
                  crossAxisAlignment: CrossAxisAlignment.center,
                  children: [
                    Text(
                        "Are you sure want to delete '${widget.list[widget.index]['title']}'"),
                    SizedBox(
                      height: 20,
                    ),
                    Row(
                      mainAxisAlignment: MainAxisAlignment.center,
                      children: [
                        RaisedButton(
                          onPressed: () {
                            deleteData();
                            Navigator.of(context).push(MaterialPageRoute(
                                builder: (BuildContext context) => MyApp()));
                          },
                          child: Text(
                            "Hapus",
                            style: TextStyle(color: Colors.white),
                          ),
                          color: Colors.blueAccent,
                        ),
                        SizedBox(
                          width: 20,
                        ),
                        RaisedButton(
                          onPressed: () => Navigator.pop(context),
                          child: Text(
                            "Batal",
                            style: TextStyle(color: Colors.white),
                          ),
                          color: Color.fromARGB(255, 194, 45, 34),
                        ),
                      ],
                    )
                  ],
                ),
              ),
            ),
          );
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
                  enabled: false,
                  controller: controllerJudul,
                  decoration: InputDecoration(
                      hintText: "Judul",
                      labelText: "Judul",
                      border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(14.0))),
                ),
                const SizedBox(height: 10.0),
                TextField(
                  enabled: false,
                  controller: controllerIsi,
                  decoration: InputDecoration(
                      hintText: "Isi",
                      labelText: "Isi",
                      border: OutlineInputBorder(
                          borderRadius: BorderRadius.circular(14.0))),
                ),
                const SizedBox(height: 25.0),
                RaisedButton(
                  child: Text(
                    "Edit Data",
                    style: TextStyle(color: Colors.white),
                  ),
                  color: Colors.blueAccent,
                  elevation: 6.0,
                  onPressed: () {
                    Navigator.of(context).push(MaterialPageRoute(
                        builder: (BuildContext context) =>
                            EditData(list: widget.list, index: widget.index)));
                  },
                ),
                RaisedButton(
                  child: Text(
                    "Hapus Data",
                    style: TextStyle(color: Colors.white),
                  ),
                  color: Colors.red,
                  elevation: 6.0,
                  onPressed: () => confirm(),
                )
              ],
            )
          ],
        ),
      ),
    );
  }
}
