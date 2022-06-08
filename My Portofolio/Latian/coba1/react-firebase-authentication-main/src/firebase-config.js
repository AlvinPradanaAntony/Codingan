import { initializeApp } from "firebase/app";
import { getAuth } from "firebase/auth";

const firebaseConfig = {
apiKey: "AIzaSyB9p-WbmeThhu7cjyR0bzXZDSamRGkx5CA",
  authDomain: "reactfirebase-96f6b.firebaseapp.com",
  projectId: "reactfirebase-96f6b",
  storageBucket: "reactfirebase-96f6b.appspot.com",
  messagingSenderId: "634488125983",
  appId: "1:634488125983:web:0a990b607bb1ab234e732a"
};

const app = initializeApp(firebaseConfig);

export const auth = getAuth(app);
