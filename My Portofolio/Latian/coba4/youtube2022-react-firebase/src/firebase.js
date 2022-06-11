import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";
import { getFirestore } from "firebase/firestore";
import { getStorage } from "firebase/storage";


const firebaseConfig = {
  apiKey: process.env.REACT_APP_FIREBASE_KEY,
  authDomain: "latiancrud-25e2c.firebaseapp.com",
  databaseURL: "https://latiancrud-25e2c-default-rtdb.firebaseio.com",
  projectId: "latiancrud-25e2c",
  storageBucket: "latiancrud-25e2c.appspot.com",
  messagingSenderId: "514987945998",
  appId: "1:514987945998:web:b509931bb75eabdc744c5f",
  measurementId: "G-9GWKE9QSQC"
};

const app = initializeApp(firebaseConfig);
export const db = getFirestore(app);
export const auth = getAuth();
export const storage = getStorage(app);
