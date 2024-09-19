// import 'package:flutter/material.dart';
// // import 'package:firebase_auth/firebase_auth.dart';
// import 'package:cloud_firestore/cloud_firestore.dart';
// import 'package:datetime_picker_formfield/datetime_picker_formfield.dart';
// import 'package:intl/intl.dart';
// import 'package:crud_firebase/user.dart';
import'package:flutter/material.dart';
import 'package:firebase_core/firebase_core.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import'main.dart';

class AddData extends StatefulWidget{
  @override
  _AddDataState createState() => _AddDataState();
}

class _AddDataState extends State<AddData>{
  TextEditingController nameController = TextEditingController();
  TextEditingController numberController = TextEditingController();

final CollectionReference users = FirebaseFirestore.instance.collection('users');

  void addData() async{
    final String? name = nameController.text;
    final int? number = int.parse(numberController.text);
    await users.add({
                          "name": name,
                          "number": number,
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
                  controller: nameController,
                  decoration: InputDecoration(
                    hintText: "Nama",
                    labelText: "Nama",
                    border: OutlineInputBorder(
                      borderRadius: BorderRadius.circular(14.0)
                    )
                  ),
                ),
                const SizedBox(height: 10.0),
                TextField(
                  controller: numberController,
                  decoration: InputDecoration(
                    hintText: "Nomer HP",
                    labelText: "Nomer HP",
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