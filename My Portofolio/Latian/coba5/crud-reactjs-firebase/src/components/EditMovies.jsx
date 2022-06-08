import { doc, updateDoc } from "firebase/firestore";
import React, {useState} from "react";
import { db } from "../lib/init-firebase";

export default function EditMovies() {
  const [name, setName] = useState("");
  const [id, setId] = useState("");

  function handleSubmit(e) {
    e.preventDefault();
    if (name === "" || id === "") {
      return;
    }
    const docRef = doc(db, "movies", id);
    updateDoc(docRef, { name })
      .then((response) => {
        console.log(response);
      })
      .catch((error) => console.log(error.message));
  }
  return (
    <div>
      <h1>Edit</h1>
      <form onSubmit={handleSubmit}>
        <label htmlFor="id">Name ID</label>
        <input id="id" type="text" value={id} onChange={(e) => setId(e.target.value)} />
        <br/>
        <label htmlFor="name">Age</label>
        <input id="name" type="text" value={name} onChange={(e) => setName(e.target.value)} />
        <button type="submit">Add</button>
      </form>
    </div>
  );
}
