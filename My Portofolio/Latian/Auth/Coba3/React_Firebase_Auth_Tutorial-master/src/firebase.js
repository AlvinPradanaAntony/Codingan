import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";

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
export const auth = getAuth(app);
export default app;
