import React, { useEffect, useState } from "react";
import { collection, getDocs, deleteDoc, doc, onSnapshot } from "firebase/firestore";
import { db } from "../lib/init-firebase";
import { moviesCollection } from "../lib/firebase.collection";
export default function ListMovies() {
  const [movies, setMovies] = useState([]);
  const [name, setName] = useState("");

  // useEffect(() => {
  //   getMovies();
  // }, []);

  // useEffect(() => {
  //   console.log(movies);
  // }, [movies]);
  useEffect(() => {
    const unsubscribe = onSnapshot(moviesCollection, (snapshot) => {
      setMovies(snapshot.docs.map((doc) => ({ id: doc.id, data: doc.data() })));
    });
    return () => {
      unsubscribe();
    };
  }, []);

  function getMovies() {
    // const movieCollectionRef = collection(db, "movies");
    getDocs(moviesCollection)
      .then((response) => {
        // console.log(response.docs)
        const movs = response.docs.map((doc) => ({
          id: doc.id,
          data: doc.data(),
        }));
        setMovies(movs);
      })
      .catch((error) => console.log(error.message));
  }
  function handleDelete(id, name) {
    const docRef = doc(db, "movies", id);
    deleteDoc(docRef)
    .then(() => {
      console.log("Document Deleted");
      alert(name);
    })
    .catch((error) => console.log(error.message))
  }

  return (
    <div>
      <h1>List Movies</h1>
      <button onClick={() => getMovies()}>Refresh</button>
      <ul>
        {movies.map((movie) => (
          <li key={movie.id}>
            {movie.id} : {movie.data.name}
            <button onClick={() => handleDelete(movie.id, movie.data.name)}>Delete</button>
          </li>
        ))}
      </ul>
    </div>
  );
}
