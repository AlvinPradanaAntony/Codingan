import 'package:flutter/material.dart';

class CrudUser extends StatefulWidget {
  const CrudUser({ Key? key }) : super(key: key);

  @override
  State<CrudUser> createState() => _CrudUserState();
}

class _CrudUserState extends State<CrudUser> {
  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Edit User"),
      )
    );
  }
}