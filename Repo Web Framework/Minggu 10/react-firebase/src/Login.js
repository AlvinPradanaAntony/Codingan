import React, { useState, useContext } from "react";
import { AuthContext } from "./index";
import firebase from "firebase/compat/app";
import "firebase/compat/auth";

const Login = () => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setErrors] = useState("");
  const [user, setUser] = useState({});

  firebase.auth().onAuthStateChanged((user) => {
    setUser(user);
  });

  const logout = (e) => {
    e.preventDefault();
    firebase.auth().signOut();
  };

  const Auth = useContext(AuthContext);
  const handleForm = (e) => {
    e.preventDefault();
    firebase
      .auth()
      .signInWithEmailAndPassword(email, password)
      .then((res) => {
        if (res.user) Auth.setLoggedIn(true);
      })
      .catch((e) => {
        setErrors(e.message);
      });
  };
  function condition() {
    if (user?.email == null) {
      return (
        <div>
          <form onSubmit={(e) => handleForm(e)}>
            <input className="form-control" value={email} onChange={(e) => setEmail(e.target.value)} name="email" type="email" placeholder="Email" />
            <input className="form-control" onChange={(e) => setPassword(e.target.value)} name="password" value={password} type="password" placeholder="Password" />
            <br />
            <button type="submit" className="btn btn-primary">
              Login
            </button>
            <br></br>
            <span>{error}</span>
          </form>
        </div>
      );
    } else {
      return(
        <div>
          <span>Sebagai: {user?.email}</span>
          <form onSubmit={(e) => logout(e)}>
            <input className="form-control" value={email} onChange={(e) => setEmail(e.target.value)} name="email" type="email" placeholder="Email" />
            <input className="form-control" onChange={(e) => setPassword(e.target.value)} name="password" value={password} type="password" placeholder="Password" />
            <br />
            <button type="submit" className="btn btn-danger">
              Logout
            </button>
            <br></br>
            <span>{error}</span>
          </form>
        </div>
      );
    }
  }

  return (
    <div>
      <h1>
        Login<br></br>
      </h1>
      {condition()}
    </div>
  );
};

export default Login;
