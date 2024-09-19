import 'package:flutter/material.dart';

void main() {
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  // This widget is the root of your application.
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        debugShowCheckedModeBanner: false,
        title: 'Implementasi Import Gambar',
        theme: ThemeData(
          primarySwatch: Colors.deepPurple,
        ),
        home: Scaffold(
            appBar: AppBar(
              centerTitle: true,
              title: Text("belajarFlutter.com"),
            ),
            body: Column(
              children: <Widget>[
                Image.network(
                    'https://cdn.pixabay.com/photo/2019/11/10/17/36/indonesia-4616370_1280.jpg'),
                Image.asset('assets/images/pict2.jpg'),
              ],
            )));
  }
}
