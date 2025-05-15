import React, { useState } from "react";
import { addDoc, collection, getDocs } from "firebase/firestore";
import { db } from "../lib/init-firebase";
import { moviesCollection } from "../lib/firebase.collection";

export default function AddMovie() {
  const [name, setName] = useState("");

  function handleSubmit(e) {
    e.preventDefault();
    if (name === "") {
      return;
    }
    // const movieCollectionRef = collection(db, "movies");
    addDoc(moviesCollection, { name })
      .then((res) => {
        console.log(res.id);
      })
      .catch((err) => {
        console.log(err.message);
      });
    alert(name);
  }
  return (
    <div>
      <h1>Add Movie</h1>
      <form onSubmit={handleSubmit}>
        <label htmlFor="name">Movie Name</label>
        <input type="text" value={name} onChange={(e) => setName(e.target.value)} />
        <button type="submit">Add</button>
      </form>
    </div>
  );
}
