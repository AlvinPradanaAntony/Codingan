import 'package:flutter/material.dart';
import 'package:flutter/scheduler.dart';

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
      title: 'Flutter Demo',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: new Home(),
    );
  }
}

class Home extends StatefulWidget {
  @override
  _HomeState createState() => _HomeState();
}

class _HomeState extends State<Home> {
  final List<String> gambar = [
    "1.jpg",
    "2.jpg",
    "3.jpg",
    "4.jpg",
    "5.jpg",
    "6.jpg",
    "7.jpg",
    "8.jpg"
  ];

  static const Map<String, Color> colors = {
    '1': Color(0XFF2DB569),
    '2': Color(0XFFF386B8),
    '3': Color(0XFF45CAF5),
    '4': Color(0XFFB19ECB),
    '5': Color(0XFFF58E4C),
    '6': Color(0XFF46C1BE),
    '7': Color(0XFFFFEA0E),
    '8': Color(0XFFDBE4E9)
  };

  // @override
  // Widget build(BuildContext context) {
  //   return new Scaffold(
  //     body: new Container(
  //       decoration: new BoxDecoration(
  //           gradient: new LinearGradient(
  //               begin: FractionalOffset.topCenter,
  //               end: FractionalOffset.bottomCenter,
  //               colors: [
  //             Colors.white,
  //             Colors.purpleAccent,
  //             Colors.deepPurple
  //           ])), // LinearGradient // BoxDecoration
  //     ), // Container
  //   ); // Scaffold
  // }

  @override
  Widget build(BuildContext context) {
    timeDilation = 5.0;
    return new Scaffold(
      body: new Container(
        decoration: new BoxDecoration(
          gradient: new LinearGradient(
              begin: FractionalOffset.topCenter,
              end: FractionalOffset.bottomCenter,
              colors: [Colors.white, Colors.purple, Colors.deepPurple]),
        ), // BoxDecoration
        child: new PageView.builder(
            controller: new PageController(viewportFraction: 0.8),
            itemCount: gambar.length,
            itemBuilder: (BuildContext context, int i) {
              return new Padding(
                  padding:
                      new EdgeInsets.symmetric(horizontal: 5.0, vertical: 50.0),
                  child: new Material(
                    elevation: 8.0,
                    child: new Stack(
                      fit: StackFit.expand,
                      children: <Widget>[
                        new Hero(
                            tag: gambar[i],
                            child: new Material(
                              child: new InkWell(
                                child: new Flexible(
                                  flex: 1,
                                  child: Container(
                                    color: colors.values.elementAt(i),
                                    child: new Image.asset(
                                      "assets/img/${gambar[i]}",
                                      fit: BoxFit.cover,
                                    ), // Image.asset
                                  ), // Container
                                ), // Flexible
                                onTap: () => Navigator.of(context).push(
                                    new MaterialPageRoute(
                                        builder: (BuildContext context) =>
                                            new Halamandua(
                                              gambar: gambar[i],
                                              colors:
                                                  colors.values.elementAt(i),
                                            ))), // Halamandua // MaterialPagel
                              ), // Inklell
                            )) // Material // Padding
                      ],
                    ),
                  ));
            }),
      ),
    );
  }
}

class Halamandua extends StatefulWidget {
  Halamandua({required this.gambar, required this.colors});
  final String gambar;
  final Color colors;

  @override
  _HalamanduaState createState() => _HalamanduaState();
}

class _HalamanduaState extends State<Halamandua> {
  Color warna = Colors.purple;

  void _pilihannya(Pilihan pilihan) {
    setState(() {
      warna = pilihan.warna;
    });
  }

  @override
  Widget build(BuildContext context) {
    return new Scaffold(
      appBar: new AppBar(
        title: new Text("BT21"),
        backgroundColor: Colors.purpleAccent,
        actions: <Widget>[
          new PopupMenuButton<Pilihan>(
            onSelected: _pilihannya,
            itemBuilder: (BuildContext context) {
              return listPilihan.map((Pilihan x) {
                return new PopupMenuItem<Pilihan>(
                  child: new Text(x.teks),
                  value: x,
                );
              }).toList();
            },
          )
        ],
      ), // AppBar
      body: new Stack(
        children: <Widget>[
          new Container(
            decoration: new BoxDecoration(
                gradient: new RadialGradient(
                    center: Alignment.center,
                    colors: [Colors.purple, Colors.white, warna])),
          ),
          new Center(
            child: new Hero(
                tag: widget.gambar,
                child: new ClipOval(
                    child: new SizedBox(
                        width: 200.0,
                        height: 200.0,
                        child: new Material(
                          child: new InkWell(
                            onTap: () => Navigator.of(context).pop(),
                            child: new Flexible(
                              flex: 1,
                              child: Container(
                                color: widget.colors,
                                child: new Image.asset(
                                  "assets/img/${widget.gambar}",
                                  fit: BoxFit.cover,
                                ), // Image.asset
                              ), // Container
                            ), // Flexible
                          ), // Inklel1
                        )))), // Material // SizedBox // Clipoval // Hero
          ) // Center
        ],
      ), // <widget>[]
    ); // Stack
  }
}

class Pilihan {
  const Pilihan({required this.teks, required this.warna});
  final String teks;
  final Color warna;
}

List<Pilihan> listPilihan = const <Pilihan>[
  const Pilihan(teks: "Red", warna: Colors.red),
  const Pilihan(teks: "Green", warna: Colors.green),
  const Pilihan(teks: "Blue", warna: Colors.blue),
]; // <Pilihan>[]
