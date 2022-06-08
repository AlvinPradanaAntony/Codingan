import { useState } from "react";
import { signInWithEmailAndPassword, onAuthStateChanged, signOut } from "firebase/auth";
import "./App.css";
import { auth } from "./firebase-config";

function App() {
  const [loginEmail, setLoginEmail] = useState("");
  const [loginPassword, setLoginPassword] = useState("");
  const [error, setErrors] = useState("");
  const [user, setUser] = useState({});
  onAuthStateChanged(auth, (currentUser) => {
    setUser(currentUser);
  });

  const login = async () => {
    try {
      const user = await signInWithEmailAndPassword(auth, loginEmail, loginPassword);
      console.log(user);
      // firebase
      // .auth()
      // .signInWithEmailAndPassword(loginEmail, loginPassword)
      // .then((res) => {
      //   if (res.user) {
      //     console.log(user);
      //   }
      // })
    } catch (error) {
      setErrors(error.code);
    }
  };

  const logout = async () => {
    await signOut(auth);
  };

  return (
    <div className="App">
      <div>
        <h3> Login </h3>
        <input
          placeholder="Email..."
          type="email"
          onChange={(event) => {
            setLoginEmail(event.target.value);
          }}
        />
        <input
          placeholder="Password..."
          type="password"
          onChange={(event) => {
            setLoginPassword(event.target.value);
          }}
        />

        <button onClick={login}> Login</button>
      </div>
      <div>
        <span>{error}</span>
      </div>
      <h4> User Logged In: </h4>
      {user?.email}

      <button onClick={logout}> Sign Out </button>
    </div>
  );
}

export default App;
