import { collection } from "firebase/firestore";
import { db } from "./init-firebase";

export const moviesCollection = collection(db,"movies");