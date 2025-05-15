import React, { useEffect, useState } from "react";
import { db, auth } from "../firebase";
import {
  collection,
  query,
  where,
  onSnapshot,
} from "firebase/firestore";
import User from "../components/User";
import { Link } from "react-router-dom";

const Home = () => {
  const [users, setUsers] = useState([]);


  const user1 = auth.currentUser.uid;

  useEffect(() => {
    const usersRef = collection(db, "users");
    // create query object
    const q = query(usersRef, where("uid", "not-in", [user1]));
    // execute query
    const unsub = onSnapshot(q, (querySnapshot) => {
      let users = [];
      querySnapshot.forEach((doc) => {
        users.push(doc.data());
      });
      setUsers(users);
    });
    return () => unsub();
  }, []);



  return (
    <div className="home_container">
      <div className="users_container">
        {users.map((user) => (
          console.log(user),
          <Link to={`/chat/${user.uid}`} className="link">
          <User
            key={user.uid}
            user={user}
            user1={user1}
          />
          </Link>
        ))}
      </div>
    </div>
  );
};

export default Home;
