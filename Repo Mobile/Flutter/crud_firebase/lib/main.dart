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
        primarySwatch: Colors.purple,
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
  final ageController = TextEditingController();
  final birthController = TextEditingController();

  final CollectionReference users =
      FirebaseFirestore.instance.collection('users');

  Future<void> _createOrUpdate([DocumentSnapshot? documentSnapshot]) async {
    String action = 'create';
    if (documentSnapshot != null) {
      action = 'update';
      nameController.text = documentSnapshot['name'];
      ageController.text = documentSnapshot['age'].toString();
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
                    controller: ageController,
                    decoration: const InputDecoration(labelText: 'Age')),
                ElevatedButton(
                  child: Text(action == 'create' ? 'Create' : 'Update'),
                  onPressed: () async {
                    final String? name = nameController.text;
                    final int? age = int.parse(ageController.text);

                    if (name != null && age != null) {
                      if (action == 'create') {
                        await users.add({
                          "name": name,
                          "age": age,
                        });
                      }
                      if (action == 'update') {
                        await users.doc(documentSnapshot!.id).update({
                          "name": name,
                          "age": age,
                        });
                      }
                      nameController.text = "";
                      ageController.text = "";
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
                      subtitle: Text(documentSnapshot['age'].toString()),
                      trailing: SizedBox(
                        width: 100,
                        child: Row(
                          children: [
                            IconButton(
                              icon: const Icon(Icons.edit),
                              onPressed: () {
                                _createOrUpdate(documentSnapshot);
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
          _createOrUpdate();
        },
      ),
    );
  }
}
//   Widget buildUser(User user) => ListTile(
//         leading: CircleAvatar(child: Text('${user.age}')),
//         title: Text(user.name),
//         subtitle: Text(user.birthday.toIso8601String()),
//       );

//   Stream<List<User>> readUsers() => FirebaseFirestore.instance
//       .collection('users')
//       .snapshots()
//       .map((snapshot) =>
//           snapshot.docs.map((doc) => User.fromJson(doc.data())).toList());
// }

// class User {
//   String id;
//   final String name;
//   final int age;
//   final DateTime birthday;

//   User(
//       {this.id = '',
//       required this.name,
//       required this.age,
//       required this.birthday});

//   Map<String, dynamic> toJson() => {
//         'id': id,
//         'name': name,
//         'age': age,
//         'birthday': birthday,
//       };

//   static User fromJson(Map<String, dynamic> json) => User(
//         id: json['id'],
//         name: json['name'],
//         age: json['age'],
//         birthday: (json['birthday'] as Timestamp).toDate(),
//       );
// }
