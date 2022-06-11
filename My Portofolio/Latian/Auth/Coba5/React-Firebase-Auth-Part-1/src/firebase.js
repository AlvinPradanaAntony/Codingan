import { useEffect, useState } from "react";

// Import the functions you need from the SDKs you need
import { initializeApp } from "firebase/app";
import { getAuth, createUserWithEmailAndPassword, signInWithEmailAndPassword, onAuthStateChanged, signOut } from "firebase/auth";

// Your web app's Firebase configuration
const firebaseConfig = {
  apiKey: "AIzaSyC5TGVgdM5goEa3lbPVWZuhblObTe_iN0Q",
  authDomain: "latiancrud-25e2c.firebaseapp.com",
  databaseURL: "https://latiancrud-25e2c-default-rtdb.firebaseio.com",
  projectId: "latiancrud-25e2c",
  storageBucket: "latiancrud-25e2c.appspot.com",
  messagingSenderId: "514987945998",
  appId: "1:514987945998:web:b509931bb75eabdc744c5f",
  measurementId: "G-9GWKE9QSQC"
};

// Initialize Firebase
const app = initializeApp(firebaseConfig);
const auth = getAuth();

export function signup(email, password) {
  return createUserWithEmailAndPassword(auth, email, password);
}

export function login(email, password) {
  return signInWithEmailAndPassword(auth, email, password);
}

export function logout() {
  return signOut(auth);
}

// Custom Hook
export function useAuth() {
  const [ currentUser, setCurrentUser ] = useState();

  useEffect(() => {
    const unsub = onAuthStateChanged(auth, user => setCurrentUser(user));
    return unsub;
  }, [])

  return currentUser;
}
