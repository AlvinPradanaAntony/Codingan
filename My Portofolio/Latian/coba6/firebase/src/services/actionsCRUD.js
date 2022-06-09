import { db } from "../config/firebase-config";

import { collection, getDocs, getDoc, addDoc, updateDoc, deleteDoc, doc } from "firebase/firestore";

const studentsCollectionRef = collection(db, "students");

export default new class ActionsFirebaseStudents {
  addStudents = (field) => {
    addDoc(studentsCollectionRef, field)
      .then((res) => {
        console.log(res);
        console.log("Document successfully written!");
      })
      .catch((err) => {
        console.log(err.message);
      });
  };

  updateBook = (id, updatedBook) => {
    const bookDoc = doc(db, "books", id);
    return updateDoc(bookDoc, updatedBook);
  };

  deleteBook = (id) => {
    const bookDoc = doc(db, "books", id);
    return deleteDoc(bookDoc);
  };

  getAllBooks = () => {
    return getDocs(studentsCollectionRef);
  };

  getBook = (id) => {
    const bookDoc = doc(db, "books", id);
    return getDoc(bookDoc);
  };
};
