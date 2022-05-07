import 'package:faker/faker.dart';
import 'package:flutter/material.dart';

void main() {
  // runApp(const Myapp());
  runApp(Myapp());
}

// class Myapp extends StatelessWidget {
//   @override
//   Widget build(BuildContext context) {
//     return const MaterialApp(
//       title: "Belajar Flutter",
//       debugShowCheckedModeBanner: false,
//       home: HomePage(title: "Belajar Flutter")
//     );
//   }
// }

// class HomePage extends StatefulWidget {
//   final String title;
//   const HomePage({Key? key, required this.title}) : super(key: key);

//   @override
//   State<HomePage> createState() => _HomePageState();
// }
// class _HomePageState extends State<HomePage> {
//   @override
//     Widget build(BuildContext Context){
//     return Scaffold(
//       appBar: AppBar(
//         title: Text(widget.title),
//       ),
//       body: Container(
//         width: double.infinity,
//         child: const Center(
//           child: Text("Coba Text ini gaiz"),
//         ),
//       ),
//     );
//   }
// }

// class Myapp extends StatelessWidget {
//   const Myapp({Key? key}) : super(key: key);

//   @override
//   Widget build(BuildContext context) {
//     return MaterialApp(
//       debugShowCheckedModeBanner: false,
//       home: Scaffold(
//         backgroundColor: const Color.fromARGB(255, 10, 21, 49),
//         appBar: AppBar(
//           title: const Text("Belajar Flutter"),
//           centerTitle: true,
//         ),
//         body: const Center(
//           child: Text(
//             "Mencoba dengan cara sederhana",
//             style: TextStyle(
//               color: Colors.white,
//             )
//             ),
//         )
//       )
//     );
//   }
// }

// class Myapp extends StatelessWidget {
//   const Myapp({Key? key}) : super(key: key);
//   @override
//   Widget build(BuildContext context) {
//     return MaterialApp(
//       debugShowCheckedModeBanner: false,
//       home: Scaffold(
//         appBar: AppBar(
//           title: const Text("Belajar Row Column"),
//           centerTitle: true,
//         ),
//         body: Row(
//           mainAxisAlignment: MainAxisAlignment.center,
//           crossAxisAlignment: CrossAxisAlignment.end,
//           children: [
//             Container(
//               width: 50,
//               height: 250,
//               color: Color.fromARGB(255, 3, 79, 244),
//             ),
//             Container(
//               width: 50,
//               height: 182,
//               color: Color.fromARGB(255, 23, 244, 3),
//             ),
//             Container(
//               width: 125,
//               height: 145,
//               color: Color.fromARGB(255, 176, 3, 244),
//             ),
//             Container(
//               width: 50,
//               height: 100,
//               color: Color.fromARGB(255, 244, 79, 3),
//             ),
//           ],
//         )
//       )
//     );
//   }
// }

// ignore: use_key_in_widget_constructors
class Myapp extends StatelessWidget {
// Listview

// final List<Widget> myList = [
//     Container(
//       width: 300,
//       height: 300,
//       color: Color.fromARGB(255, 3, 79, 244),
//     ),
//     Container(
//       width: 300,
//       height: 300,
//       color: Color.fromARGB(255, 23, 244, 3),
//     ),
//     Container(
//       width: 300,
//       height: 300,
//       color: Color.fromARGB(255, 176, 3, 244),
//     ),
//     Container(
//       width: 300,
//       height: 300,
//       color: Color.fromARGB(255, 3, 39, 244),
//     ),
//   ];
//   @override
//   Widget build(BuildContext context) {
//     return MaterialApp(
//         debugShowCheckedModeBanner: false,
//         home: Scaffold(
//             appBar: AppBar(
//               title: const Text("ListView"),
//               centerTitle: true,
//             ),
//             body: ListView(
//               // scrollDirection: Axis.horizontal,
//               children: myList,
//             )));
//   }

// ListView.builder
  // final List<Color> colors = [
  //   Colors.amber,
  //   Colors.blue,
  //   Colors.green,
  //   Colors.red
  // ];
  // @override
  // Widget build(BuildContext context) {
  //   return MaterialApp(
  //       debugShowCheckedModeBanner: false,
  //       home: Scaffold(
  //           appBar: AppBar(
  //             title: const Text("ListView.builder"),
  //             centerTitle: true,
  //           ),
  //           body: ListView.builder(
  //             itemCount: colors.length,
  //             itemBuilder: (BuildContext context, int index) {
  //               return Container(
  //                 width: 300,
  //                 height: 300,
  //                 color: colors[index],
  //               );
  //             },
  //           )));
  // }

// ListView.separated
  // final List<Color> colors = [
  //   Colors.amber,
  //   Colors.blue,
  //   Colors.green,
  //   Colors.red
  // ];
  // final List<Text> texts = List.generate(20, (index) => Text(index.toString()));
  // @override
  // Widget build(BuildContext context) {
  //   return MaterialApp(
  //       debugShowCheckedModeBanner: false,
  //       home: Scaffold(
  //           appBar: AppBar(
  //             title: const Text("ListView.separated"),
  //             centerTitle: true,
  //           ),
  //           body: ListView.separated(
  //             // separatorBuilder: (context, index) => Container(
  //             //   height: 10,
  //             // ),
  //             separatorBuilder: (context, index) => const Divider(
  //               color: Colors.black,
  //             ),
  //             // separatorBuilder: (context, index) => Container(
  //             //   // height: 0,
  //             // ),
  //             itemCount: texts.length,
  //             itemBuilder: (BuildContext context, int index) {
  //               // return Container(
  //               //   width: 300,
  //               //   height: 300,
  //               //   color: colors[index],
  //               // );
  //               //   return Text(texts[index].toString());
  //               return Padding(
  //                 padding: EdgeInsets.all(8.0),
  //                 child: Center(child: Text("Nomer $index")),
  //               );
  //             },
  //           )));
  // }

  //ListTile
  // @override
  // Widget build(BuildContext context) {
  //   return MaterialApp(
  //       debugShowCheckedModeBanner: false,
  //       home: Scaffold(
  //           appBar: AppBar(
  //             title: const Text("ListTile"),
  //             centerTitle: true,
  //           ),
  //           body: ListView(children: const [
  //             ListTile(
  //               contentPadding: EdgeInsets.all(10),
  //               title: Text(
  //                 "Alvin Pradana Antony",
  //               ),
  //               subtitle: Text(
  //                 "1Velit incididunt labore in tempor fugiat veniam occaecat dolor consequat adipisicing. Consequat laborum pariatur eiusmod in cupidatat.",
  //                 maxLines: 2,
  //                 textAlign: TextAlign.justify,
  //                 overflow: TextOverflow.ellipsis,
  //               ),
  //               leading: CircleAvatar(),
  //               trailing: Text("10.00"),
  //             ),
  //             Divider(),
  //             ListTile(
  //               contentPadding: EdgeInsets.all(10),
  //               title: Text(
  //                 "Hank Andersson",
  //               ),
  //               subtitle: Text(
  //                 "1Velit incididunt labore in tempor fugiat veniam occaecat dolor consequat adipisicing. Consequat laborum pariatur eiusmod in cupidatat.",
  //                 maxLines: 2,
  //                 textAlign: TextAlign.justify,
  //                 overflow: TextOverflow.ellipsis,
  //               ),
  //               leading: CircleAvatar(),
  //               trailing: Text("10.00"),
  //             ),
  //             Divider(),
  //             ListTile(
  //               contentPadding: EdgeInsets.all(10),
  //               title: Text(
  //                 "Tsubasa",
  //               ),
  //               subtitle: Text(
  //                 "1Velit incididunt labore in tempor fugiat veniam occaecat dolor consequat adipisicing. Consequat laborum pariatur eiusmod in cupidatat.",
  //                 maxLines: 2,
  //                 textAlign: TextAlign.justify,
  //                 overflow: TextOverflow.ellipsis,
  //               ),
  //               leading: CircleAvatar(),
  //               trailing: Text("10.00"),
  //             ),
  //             Divider(),
  //             ListTile(
  //               contentPadding: EdgeInsets.all(10),
  //               title: Text(
  //                 "Rifki Lukman",
  //               ),
  //               subtitle: Text(
  //                 "1Velit incididunt labore in tempor fugiat veniam occaecat dolor consequat adipisicing. Consequat laborum pariatur eiusmod in cupidatat.",
  //                 maxLines: 2,
  //                 textAlign: TextAlign.justify,
  //                 overflow: TextOverflow.ellipsis,
  //               ),
  //               leading: CircleAvatar(),
  //               trailing: Text("10.00"),
  //             ),
  //             Divider(),
  //           ])));
  // }

// Image Widget
  // @override
  // Widget build(BuildContext context) {
  //   return MaterialApp(
  //       debugShowCheckedModeBanner: false,
  //       home: Scaffold(
  //         appBar: AppBar(
  //           title: const Text("Image Widget"),
  //           centerTitle: true,
  //         ),
  //         body: Center(
  //           child: Container(
  //             width: 350,
  //             height: 500,
  //             child: const Image(
  //               image: AssetImage("assets/img/1.jpg"),
  //               fit: BoxFit.cover,
  //             ),
  //             // const Image(image: NetworkImage("https://picsum.photos/325/475")),
  //             // Image.network("https://picsum.photos/325/475"),
  //           )
  //         ),
  //       )
  //     );
  // }

// Export Widget
  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        debugShowCheckedModeBanner: false,
        home: Scaffold(
          appBar: AppBar(
            title: const Text("Image Widget"),
            centerTitle: true,
          ),
          body: ListView.builder(
            itemCount: 25,
            itemBuilder: (BuildContext context, int index){
              return 
              ListData(
                title: faker.person.name(), 
                subtitle: faker.lorem.sentence(), 
                imageUrl: 'https://picsum.photos/id/$index/200/300',
              );
            },
          ),       
        )
    );
  }
}

class ListData extends StatelessWidget {
  final String title;
  final String subtitle;
  final String imageUrl;

  // ignore: use_key_in_widget_constructors
  const ListData({required this.title, required this.subtitle, required this.imageUrl,});

  @override
  Widget build(BuildContext context) {
    return ListTile(
      contentPadding: const EdgeInsets.all(10),
      title: Text(
        title,
      ),
      subtitle: Text(
        subtitle,
        maxLines: 2,
        textAlign: TextAlign.justify,
        overflow: TextOverflow.ellipsis,
      ),
      leading: CircleAvatar(
        backgroundImage: NetworkImage(imageUrl),
      ),
      trailing: const Text("10.00"),
      );
  }
}
