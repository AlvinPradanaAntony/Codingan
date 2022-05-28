import React, { useState, useContext } from "react";
import { AuthContext } from "./index";
import firebase from "firebase/compat/app";
import "firebase/compat/auth";

const Login = () => {
  const [email, setEmail] = useState("");
  const [password, setPassword] = useState("");
  const [error, setErrors] = useState("");

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

  return (
    <div>
      <h1>Login</h1>
      <form onSubmit={(e) => handleForm(e)}>
        <input className="form-control" value={email} onChange={(e) => setEmail(e.target.value)} name="email" type="email" placeholder="Email" />

        <input className="form-control" onChange={(e) => setPassword(e.target.value)} name="password" value={password} type="password" placeholder="Password" />
        <br />
        <button type="submit" className="btn btn-primary">
          Login
        </button>
        <span>{error}</span>
      </form>
    </div>
  );
};

export default Login;
