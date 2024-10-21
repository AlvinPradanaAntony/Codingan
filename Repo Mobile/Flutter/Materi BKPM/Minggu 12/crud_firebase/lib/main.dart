import 'package:flutter/material.dart';
import 'package:firebase_core/firebase_core.dart';
import 'package:cloud_firestore/cloud_firestore.dart';
import 'package:intl/date_symbol_data_local.dart';
import 'package:intl/intl.dart';
import 'package:crud_firebase/addUser.dart';

Future<void> main() async {
  WidgetsFlutterBinding.ensureInitialized();
    await Firebase.initializeApp(
    options: const FirebaseOptions(
      apiKey: "AIzaSyBiUeM_pevYEsHHKraEu_ZxyFKs_3TtFYk",
      appId: "1:979329903057:android:12f398ed6c9e0604c5d8f0",
      messagingSenderId: "979329903057",
      projectId: "flutter-mobile-3726c",
    ),
  );
  runApp(const MyApp());
}

class MyApp extends StatelessWidget {
  const MyApp({Key? key}) : super(key: key);

  @override
  Widget build(BuildContext context) {
    return MaterialApp(
      debugShowCheckedModeBanner: false,
      title: 'Flutter Firebase',
      theme: ThemeData(
        primarySwatch: Colors.blue,
      ),
      home: const MyHomePage(title: 'Flutter Firebase'),
    );
  }
}

class MyHomePage extends StatefulWidget {
  const MyHomePage({Key? key, required this.title}) : super(key: key);
  final String title;

  @override
  State<MyHomePage> createState() => _MyHomePageState();
}

class _MyHomePageState extends State<MyHomePage> {
  final nameController = TextEditingController();
  final numberController = TextEditingController();


  final CollectionReference users =
      FirebaseFirestore.instance.collection('users');

  Future<void> __Update([DocumentSnapshot? documentSnapshot]) async {
    if (documentSnapshot != null) {
      nameController.text = documentSnapshot['name'];
      numberController.text = documentSnapshot['number'].toString();
    }

    await showModalBottomSheet(
        context: context,
        builder: (BuildContext ctx) {
          return Padding(
            padding: EdgeInsets.only(
                top: 20,
                right: 20,
                left: 20,
                bottom: MediaQuery.of(ctx).viewInsets.bottom + 20),
            child: Column(
              mainAxisSize: MainAxisSize.min,
              crossAxisAlignment: CrossAxisAlignment.start,
              children: [
                TextField(
                    controller: nameController,
                    decoration: const InputDecoration(labelText: 'Name')),
                TextField(
                    controller: numberController,
                    decoration: const InputDecoration(labelText: 'number')),
                ElevatedButton(
                  child: const Text('Update'),
                  onPressed: () async {
                    final String? name = nameController.text;
                    final int? number = int.parse(numberController.text);

                    if (name != null && number != null) {
                        await users.doc(documentSnapshot!.id).update({
                          "name": name,
                          "number": number,
                        });
                      nameController.text = "";
                      numberController.text = "";
                    }
                  },
                )
              ],
            ),
          );
        });
  }

  Future<void> _deleteUser(String productId) async {
    await users.doc(productId).delete();

    ScaffoldMessenger.of(context).showSnackBar(const SnackBar(
      content: Text("User have been deleted"),
    ));
  }

  @override
  Widget build(BuildContext context) {
    return Scaffold(
      appBar: AppBar(
        title: Text("Users"),
      ),
      body: StreamBuilder(
        stream: users.snapshots(),
        builder: (context, AsyncSnapshot<QuerySnapshot> streamSnapshot) {
          if (streamSnapshot.hasData) {
            return ListView.builder(
                itemCount: streamSnapshot.data!.docs.length,
                itemBuilder: (context, index) {
                  final DocumentSnapshot documentSnapshot =
                      streamSnapshot.data!.docs[index];
                  return Card(
                    margin: const EdgeInsets.all(10),
                    child: ListTile(
                      title: Text(documentSnapshot['name']),
                      leading: CircleAvatar(
                  radius: 30,
                  backgroundImage: NetworkImage(
                      "https://ui-avatars.com/api/?name=${documentSnapshot['name']}&background=random&rounded=true&font-size=0.35&bold=true"),
                ),
                      subtitle: Text(documentSnapshot['number'].toString()),
                      trailing: SizedBox(
                        width: 100,
                        child: Row(
                          children: [
                            IconButton(
                              icon: const Icon(Icons.edit),
                              onPressed: () {
                                __Update(documentSnapshot);
                              },
                            ),
                            IconButton(
                                onPressed: () {
                                  _deleteUser(documentSnapshot.id);
                                },
                                icon: const Icon(Icons.delete))
                          ],
                        ),
                      ),
                    ),
                  );
                });
          }
          return const Center(
            child: CircularProgressIndicator(),
          );
        },
      ),
      floatingActionButton: FloatingActionButton(
        child: Icon(Icons.add),
        onPressed: () {
          Navigator.push(
              context, MaterialPageRoute(builder: (context) => AddData()));
        },
        tooltip: 'Tambah Data',
      ),
    );
  }
}
