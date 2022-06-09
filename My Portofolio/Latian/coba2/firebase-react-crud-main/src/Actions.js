import { useState, useEffect } from "react";
import "./App.css";
import { db } from "./firebase-config";
import { collection, getDocs, addDoc, updateDoc, deleteDoc, doc, onSnapshot } from "firebase/firestore";
const usersCollectionRef = collection(db, "users");

function App() {
  const [newName, setNewName] = useState("");
  const [newAge, setNewAge] = useState(0);
  const [id, setId] = useState("");
  const [users, setUsers] = useState([]);

  const createUser = async () => {
    await addDoc(usersCollectionRef, { name: newName, age: Number(newAge) });
  };

  const updateUser = async (id, name, age) => {
    setId(id);
    setNewName(name);
    setNewAge(age);
  };

  const editUser = async () => {
    const docRef = doc(db, "users", id);
    updateDoc(docRef, { name: newName, age: Number(newAge) })
      .then((response) => {
        console.log(response);
      })
      .catch((error) => console.log(error.message));
  }

  const deleteUser = async (id) => {
    const userDoc = doc(db, "users", id);
    await deleteDoc(userDoc);
  };

  useEffect(() => {
    const unsubscribe = onSnapshot(usersCollectionRef, (snapshot) => {
      setUsers(snapshot.docs.map((doc) => ({ id: doc.id, ...doc.data() })));
    });
    return () => {
      unsubscribe();
    };
  }, []);

  return (
    <div className="App">
      <input
        placeholder="Name..."
        onChange={(event) => {
          setNewName(event.target.value);
        }}
      />
      <input
        type="number"
        placeholder="Age..."
        onChange={(event) => {
          setNewAge(event.target.value);
        }}
      />
      <button onClick={createUser}> Create User</button>
      <br></br>
      <input
        value={id}
        placeholder="Id..."
        onChange={(event) => {
          setId(event.target.value);
        }}
      />
      <input
      value={newName}
        placeholder="Name..."
        onChange={(event) => {
          setNewName(event.target.value);
        }}
      />
      <input
      value={newAge}
        type="string"
        placeholder="Status..."
        onChange={(event) => {
          setNewAge(event.target.value);
        }}
      />

      <button onClick={editUser}> Edit User</button>
      {users.map((user) => {
        return (
          <div key={user.id}>
            {" "}
            <p>Id {user.id}</p>
            <h1>Name: {user.name}</h1>
            <h1>Age: {user.age}</h1>
            <button
              onClick={() => {
                updateUser(user.id, user.name, user.age);
              }}
            >
              {" "}
              Increase Age
            </button>
            <button
              onClick={() => {
                deleteUser(user.id);
              }}
            >
              {" "}
              Delete User
            </button>
          </div>
        );
      })}
    </div>
  );
}

export default App;
