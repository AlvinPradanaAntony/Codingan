import 'package:flutter/material.dart';
// import 'package:firebase_auth/firebase_auth.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:datetime_picker_formfield/datetime_picker_formfield.dart';
import 'package:intl/intl.dart';
import 'package:crud_firebase/user.dart';

class AddUser extends StatefulWidget {
  const AddUser({ Key? key }) : super(key: key);

  @override
  State<AddUser> createState() => _AddUserState();
}

class _AddUserState extends State<AddUser> {
  final nameController = TextEditingController();
  final ageController = TextEditingController();
  final birthController = TextEditingController();

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: const Text("Add User"),
      ),
      body: ListView(
        padding: EdgeInsets.all(16),
        children: <Widget>[
          TextField(
            controller: nameController,
            decoration: InputDecoration(
              hintText: 'Name',
            ),
          ),
          const SizedBox(
            height: 24,
          ),
          TextField(
            controller: ageController,
            decoration: InputDecoration(
              hintText: 'Age',
            ),
            keyboardType: TextInputType.number,
          ),
          const SizedBox(
            height: 24,
          ),
          DateTimeField(
            controller: birthController,
            decoration: InputDecoration(
              hintText: 'Date of Birth',
            ),
            format: DateFormat('yyyyMMdd'),
            onShowPicker: (context, currentValue) {
              return showDatePicker(
                  context: context,
                  firstDate: DateTime(1900),
                  initialDate: currentValue ?? DateTime.now(),
                  lastDate: DateTime(2100));
            },
          ),
          const SizedBox(height: 32),
          ElevatedButton(
              onPressed: () {
                final user = User(
                    name: nameController.text,
                    age: int.parse(ageController.text),
                    birthday: DateTime.parse(birthController.text));
                createUser(user);
              },
              child: Text("Create"))
        ],
      ),
    );
  }

  Future createUser(User user) async {
    final docUser = FirebaseFirestore.instance.collection('users').doc();
    user.id = docUser.id;
    final json = user.toJson();
    await docUser.set(json);
  }
}