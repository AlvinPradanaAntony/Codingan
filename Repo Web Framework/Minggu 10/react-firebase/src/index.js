import React, { useState } from "react";
import ReactDOM from "react-dom/client";
import "./styles.css";
// import {Switch,BrowserRouter as Router, Route } from "react-router-dom";
// import routes from "./routes";
// import Header from "./Header";
import Login from "./Login";
import reportWebVitals from "./reportWebVitals";
import firebase from "firebase/compat/app";
import firebaseConfig from "./firebase.config";

firebase.initializeApp(firebaseConfig);

export const AuthContext = React.createContext(null);
function App() {
  const [isLoggedIn, setLoggedIn] = useState(false);
  return (
    <AuthContext.Provider value={{ isLoggedIn, setLoggedIn }}>
      Is logged in?{JSON.stringify(isLoggedIn)}
      <div className="App">
        <Login />
      </div>
    </AuthContext.Provider>
  );
}

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <React.StrictMode>
    <App />
  </React.StrictMode>
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
