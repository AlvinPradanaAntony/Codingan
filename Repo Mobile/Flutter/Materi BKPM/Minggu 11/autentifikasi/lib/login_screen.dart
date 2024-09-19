import 'dart:ui';
import 'home.dart';
import 'package:firebase_auth/firebase_auth.dart';
import 'package:firebase_core/firebase_core.dart';
import 'package:flutter/material.dart';

class LoginScreen extends StatefulWidget {
  @override
  _LoginScreenState createState() => _LoginScreenState();
}

class _LoginScreenState extends State<LoginScreen> {
  final TextEditingController _emailController = TextEditingController();
  final TextEditingController _passwordController = TextEditingController();
  final FirebaseAuth _firebaseAuth = FirebaseAuth.instance;
    final _formKey = GlobalKey<FormState>();
  registerSubmit() async {
    //     AlertDialog alertDialog = new AlertDialog(
    //   content: new Container(
    //     height: 100.0,
    //     child: new Column(
    //       children: <Widget>[
    //         new Text("Fitur Daftar belum tersedia"),
    //         SizedBox( height: 50.0,),
    //         new RaisedButton(
    //           child: new Text("OK"),
    //           onPressed: () => Navigator.pop(context),
    //           color: Colors.teal,
    //         )
    //       ],
    //     ),
    //   ),
    // );
    // showDialog(context: context, builder: (_) => alertDialog);
    try {
      await _firebaseAuth.createUserWithEmailAndPassword(
        email: _emailController.text.toString().trim(), 
        password: _passwordController.text);
    } catch (e) {
      print(e);
      SnackBar(content: Text(e.toString()));
    }
  }

  loginSubmit() async {
    try {
      _firebaseAuth
        .signInWithEmailAndPassword(
          email: _emailController.text, password: _passwordController.text)
        .then((value) => Navigator.of(context).pushReplacement(
          MaterialPageRoute(builder: (context) => HomeScreen())));
    } catch (e) {
      print(e);
      SnackBar(content: Text(e.toString()));
    }
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      body: Form(
        key: _formKey,
        child: Padding(
          padding: EdgeInsets.all(10),
          child: ListView(
            children: <Widget>[
              Container(
                alignment: Alignment.center,
                padding: EdgeInsets.all(10),
                margin: const EdgeInsets.only(top: 40),
                child: Text(
                  "Latihan".toUpperCase(),
                  style: TextStyle(
                    color: Colors.blue,
                    fontWeight: FontWeight.bold,
                    fontSize: 30,
                  ),
                ),
              ),
              Padding(
                padding: const EdgeInsets.all(8),
                child: Image.asset(
                  "assets/img/flutter.png",
                  height: 100,
                  width: 100,
                  ),
                ),
                Container(
                  padding: EdgeInsets.all(10),
                  child: TextFormField(
                    controller: _emailController,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: "Username"
                    ),
                    validator: (value) {
                      if (value!.isEmpty) {
                        return 'Username Tidak boleh kosong';
                      }
                      return null;
                    },  
                  ),
                  
                ),
                Container(
                  padding: EdgeInsets.all(10),
                  child: TextFormField(
                    controller: _passwordController,
                    obscureText: true,
                    decoration: InputDecoration(
                      border: OutlineInputBorder(),
                      labelText: "Password" 
                    ),
                      validator: (value) {
                      if (value!.isEmpty) {
                        return "Password tidak boleh kosong";
                      }
                      return null;
                    }, 
                  ),
                ),
                TextButton(onPressed: () {}, child: Text("Forgot password")),
                Container(
                  height: 50,
                  padding: EdgeInsets.fromLTRB(10, 0, 10, 0),
                  child: ElevatedButton(
                    style: raisedButtonStyle,
                    child: Text("Register"),
                    onPressed: () {
                      registerSubmit();
                    },  
                  ),
                ),
                SizedBox(height: 10),
                Container(
                  height: 50,
                  padding: EdgeInsets.fromLTRB(10, 0, 10, 0),
                  child: ElevatedButton(
                    style: raisedButtonStyle,
                    child: Text("Login"),
                     onPressed: () {
                    if (_formKey.currentState!.validate()) {}
                    loginSubmit();
                  },
                 ),
                )
            ],
          ),
        ),
      ),
    );
  }
}

final ButtonStyle raisedButtonStyle = ElevatedButton.styleFrom(
  foregroundColor: Colors.grey[300], backgroundColor: Colors.blue[300],
  minimumSize: Size(88, 36,),
  padding: EdgeInsets.symmetric(horizontal: 16),
  shape: const RoundedRectangleBorder(
    borderRadius: BorderRadius.all(Radius.circular(6)),
));