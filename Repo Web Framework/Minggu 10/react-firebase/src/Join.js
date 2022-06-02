import React, { useState, useContext } from "react";
import { AuthContext } from "./index";
import firebase from "firebase/compat/app";
import "firebase/compat/auth";

const Join = () => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setError] = useState("");

  const Auth = useContext(AuthContext);
  const handleForm = (e) => {
    e.preventDefault();
    firebase
      .auth()
      .createUserWithEmailAndPassword(email, password)
      .then((res) => {
        if (res.user) Auth.setLoggedIn(true);
      })
      .catch((e) => {
        setError(e.message);
      });
  };

  const googleJoin = () => {
    const provider = new firebase.auth.GoogleAuthProvider();
    firebase
      .auth()
      .signInWithPopup(provider)
      .then((res) => {
        console.log(res);
        Auth.setLoggedIn(true);
      });
  };

  return (
    <div>
      <h1>Join</h1>
      <form onSubmit={(e) => handleForm(e)}>
        <input
          className="form-control"
          value={email}
          onChange={(e) => setEmail(e.target.value)}
          name="email"
          type="email"
          placeholder="Email"
        />
        <input
          className="form-control"
          value={password}
          onChange={(e) => setPassword(e.target.value)}
          name="password"
          type="password"
          placeholder="Password"
        />
        <button className="googleBtn" type="button" onClick={googleJoin}>
          <img src="https://upload.wikimedia.org/wikipedia/commons/5/53/Google_%22G%22_Logo.svg" alt="logo" />
          Join With Google
        </button>
        <button type="submit" className="btn btn-primary">
          Join
        </button>
        <span>{error}</span>
      </form>
    </div>
  );
};

export default Join;
