import React, { useEffect, usestate } from "react";
import { onSnapshot } from "firebase/firestore";
import { movieCollection } from "../lib/firestore.collections";
export default function RealtimeMovies() {
  const [movies, setMovies] = useState([]);
  useEffect(() => {
    const unsubscribe = onSnapshot(movieCollectionRef, (snapshot) => {
      setMovies(snapshot.docs.map((doc) => ({ id: doc.id, data: doc.data() })));
    });
    return () => {
      unsubscribe();
    };
  }, []);
  return (
    <div>
      <h4>RealtimeMovies</h4>
      <ul>
        {movies.map((movie) => (
          <li key={movie.id}>
            {movie.id} : {movie.data.name}
            <button onClick={() => handleDelete(movie.id)}>Delete</button>
          </li>
        ))}
      </ul>
    </div>
  );
}
