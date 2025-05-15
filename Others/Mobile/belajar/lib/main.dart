import 'package:faker/faker.dart';
import 'package:flutter/material.dart';
import 'package:carousel_slider/carousel_slider.dart';

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
// final List<String> imgList = [
//   'https://images.unsplash.com/photo-1520342868574-5fa3804e551c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ff92caffcdd63681a35134a6770ed3b&auto=format&fit=crop&w=1951&q=80',
//   'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
//   'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
//   'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
//   'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
//   'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
// ];

// final List<Widget> imageSliders = imgList
//     .map((item) => Container(
//           child: Container(
//             margin: const EdgeInsets.all(5.0),
//             child: ClipRRect(
//                 borderRadius: const BorderRadius.all(Radius.circular(5.0)),
//                 child: Stack(
//                   children: <Widget>[
//                     Image.network(item, fit: BoxFit.cover, width: 1000.0),
//                     Positioned(
//                       bottom: 0.0,
//                       left: 0.0,
//                       right: 0.0,
//                       child: Container(
//                         decoration: const BoxDecoration(
//                           gradient: LinearGradient(
//                             colors: [
//                               Color.fromARGB(200, 0, 0, 0),
//                               Color.fromARGB(0, 0, 0, 0)
//                             ],
//                             begin: Alignment.bottomCenter,
//                             end: Alignment.topCenter,
//                           ),
//                         ),
//                         padding: const EdgeInsets.symmetric(
//                             vertical: 10.0, horizontal: 20.0),
//                         child: Text(
//                           'No. ${imgList.indexOf(item)} image',
//                           style: const TextStyle(
//                             color: Colors.white,
//                             fontSize: 20.0,
//                             fontWeight: FontWeight.bold,
//                           ),
//                         ),
//                       ),
//                     ),
//                   ],
//                 )),
//           ),
//         ))
//     .toList();

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
//   @override
//   Widget build(BuildContext context) {
//     return MaterialApp(
//         debugShowCheckedModeBanner: false,
//         home: Scaffold(
//           appBar: AppBar(
//             title: const Text("Image Widget"),
//             centerTitle: true,
//           ),
//           body: ListView.builder(
//             itemCount: 25,
//             itemBuilder: (BuildContext context, int index){
//               return
//               ListData(
//                 title: faker.person.name(),
//                 subtitle: faker.lorem.sentence(),
//                 imageUrl: 'https://picsum.photos/id/$index/200/300',
//               );
//             },
//           ),
//         )
//     );
//   }
// }

// class ListData extends StatelessWidget {
//   final String title;
//   final String subtitle;
//   final String imageUrl;

//   // ignore: use_key_in_widget_constructors
//   const ListData({required this.title, required this.subtitle, required this.imageUrl,});

//   @override
//   Widget build(BuildContext context) {
//     return ListTile(
//       contentPadding: const EdgeInsets.all(10),
//       title: Text(
//         title,
//       ),
//       subtitle: Text(
//         subtitle,
//         maxLines: 2,
//         textAlign: TextAlign.justify,
//         overflow: TextOverflow.ellipsis,
//       ),
//       leading: CircleAvatar(
//         backgroundImage: NetworkImage(imageUrl),
//       ),
//       trailing: const Text("10.00"),
//       );
//   }

// Carousel Widget
// @override
// Widget build(BuildContext context) {
//   return MaterialApp(
//       debugShowCheckedModeBanner: false,
//       home: Scaffold(
//         appBar: AppBar(
//           title: const Text("Carousel Widget"),
//           centerTitle: true,
//         ),
//         body: Container(
//         child: CarouselSlider(
//           options: CarouselOptions(
//             autoPlay: true,
//             aspectRatio: 2.0,
//             enlargeCenterPage: true,
//           ),
//           items: imageSliders,
//         ),
//       ),
//       )
//   );
// }

// Carousel.builder
  final List<String> imgList = [
    'https://images.unsplash.com/photo-1520342868574-5fa3804e551c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=6ff92caffcdd63681a35134a6770ed3b&auto=format&fit=crop&w=1951&q=80',
    'https://images.unsplash.com/photo-1522205408450-add114ad53fe?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=368f45b0888aeb0b7b08e3a1084d3ede&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1519125323398-675f0ddb6308?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=94a1e718d89ca60a6337a6008341ca50&auto=format&fit=crop&w=1950&q=80',
    'https://images.unsplash.com/photo-1523205771623-e0faa4d2813d?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=89719a0d55dd05e2deae4120227e6efc&auto=format&fit=crop&w=1953&q=80',
    'https://images.unsplash.com/photo-1508704019882-f9cf40e475b4?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=8c6e5e3aba713b17aa1fe71ab4f0ae5b&auto=format&fit=crop&w=1352&q=80',
    'https://images.unsplash.com/photo-1519985176271-adb1088fa94c?ixlib=rb-0.3.5&ixid=eyJhcHBfaWQiOjEyMDd9&s=a0c8d632e977f94e5d312d9893258f59&auto=format&fit=crop&w=1355&q=80'
  ];

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
        debugShowCheckedModeBanner: false,
        home: Scaffold(
            appBar: AppBar(
              title: const Text("Carousel Widget"),
              centerTitle: true,
            ),
            body: CarouselSlider.builder(
              itemCount: imgList.length,
              itemBuilder:
                  (BuildContext context, int itemIndex, int pageViewIndex) =>
                      Container(
                margin: const EdgeInsets.all(5.0),
                child: ClipRRect(
                    borderRadius: const BorderRadius.all(Radius.circular(5.0)),
                    child: Stack(
                      children: <Widget>[
                        Image.network(imgList[itemIndex],
                            fit: BoxFit.cover, width: 1000.0),
                        Positioned(
                          bottom: 0.0,
                          left: 0.0,
                          right: 0.0,
                          child: Container(
                            decoration: const BoxDecoration(
                              gradient: LinearGradient(
                                colors: [
                                  Color.fromARGB(200, 0, 0, 0),
                                  Color.fromARGB(0, 0, 0, 0)
                                ],
                                begin: Alignment.bottomCenter,
                                end: Alignment.topCenter,
                              ),
                            ),
                            padding: const EdgeInsets.symmetric(
                                vertical: 10.0, horizontal: 20.0),
                            child: Text(
                              'No. ${itemIndex+1} image',
                              style: const TextStyle(
                                color: Colors.white,
                                fontSize: 20.0,
                                fontWeight: FontWeight.bold,
                              ),
                            ),
                          ),
                        ),
                      ],
                    )),
              ),
              options: CarouselOptions(
                autoPlay: true,
                aspectRatio: 2.0,
                enlargeCenterPage: true,
              ),
            )));
  }
}
