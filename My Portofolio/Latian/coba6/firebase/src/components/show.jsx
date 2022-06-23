import { doc, getDoc, updateDoc } from "firebase/firestore";
import React, { Component, useEffect, useState } from "react";
import { Link, useHistory, useParams } from "react-router-dom";
import { db } from "../config/firebase-config";

const Show = () => {
  const [students, setStudents] = useState([]);
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const [kelas, setClass] = useState("");
  const [date, setDate] = useState("");
  const [gender, setGender] = useState("");
  const [status, setStatus] = useState("");
  const [password, setPassword] = useState("");
  const history = useHistory();

  const { id } = useParams();
  useEffect(() => {
    getDoc(doc(db, "students", id)).then((docSnap) => {
      if (docSnap.exists()) {
        setStudents(docSnap.data());
        setEmail(docSnap.data().email);
        setName(docSnap.data().name);
        setClass(docSnap.data().class);
        setDate(docSnap.data().date);
        setGender(docSnap.data().gender);
        setStatus(docSnap.data().status);
        setPassword(docSnap.data().password);
      } else {
        // doc.data() will be undefined in this case
        console.log("No such document!");
      }
    });
  }, []);
  console.log("State students: ",students);
  function editData(e) {
    e.preventDefault();

    const docRef = doc(db, "students", id);
    updateDoc(docRef, { email: email, name: name, class: kelas, date: date, gender: gender, status: status, password: password })
      .then((response) => {
        console.log("Berhasil Di Update");
      })
      .catch((error) => console.log(error.message));
    alert("Berhasil di update");
    history.push("/siswa");
  }
  console.log(students);
  return (
    <div class="container">
      <div class="panel panel-default">
        <div class="panel-heading">
          <h3 class="panel-title">Edit Data Siswa</h3>
        </div>
        <div class="panel-body">
          <h4>
            <Link to="/siswa" class="btn btn-primary">
              Back
            </Link>
          </h4>
          <form onSubmit={editData}>
            <div class="form-group">
              <label htmlFor="email" className="form-label">
                Email
              </label>
              <input type="text" value={email} className="form-control" id="email" onChange={(e) => setEmail(e.target.value)} required />
            </div>
            <div class="form-group">
              <label htmlFor="password" className="form-label">
                Password
              </label>
              <input type="password" value={password} className="form-control" id="password" onChange={(e) => setPassword(e.target.value)} required />
            </div>
            <div class="form-group">
              <label htmlFor="name" className="form-label">
                Name
              </label>
              <input type="text" value={name} className="form-control" id="name" onChange={(e) => setName(e.target.value)} required />
            </div>
            <div class="form-group">
              <label htmlFor="class" className="form-label">
                Class
              </label>
              <select value={kelas} className="form-select" id="class" onChange={(e) => setClass(e.target.value)} required>
                <option value="" disabled>
                  Choose class
                </option>
                <option value="10">10</option>
                <option value="11">11</option>
                <option value="12">12</option>
              </select>
            </div>
            <div class="form-group">
              <label htmlFor="date" className="form-label">
                Date of Birth
              </label>
              <input type="date" value={date} className="form-control" id="date" onChange={(e) => setDate(e.target.value)} required />
            </div>
            <div class="form-group">
              <label htmlFor="gender" className="form-label">
                Gender
              </label>
              <select value={gender} className="form-select" id="gender" onChange={(e) => setGender(e.target.value)} required>
                <option value="" disabled>
                  Choose Gender
                </option>
                <option value="Laki-laki">Laki-laki</option>
                <option value="Perempuan">Perempuan</option>
              </select>
            </div>
            <div class="form-group">
              <label htmlFor="status" className="form-label">
                Status
              </label>
              <select value={status} className="form-select" id="status" onChange={(e) => setStatus(e.target.value)} required>
                <option value="" disabled>
                  Choose Plan
                </option>
                <option value="Free Plan">Free Plan</option>
                <option value="Personal Plan">Personal Plan</option>
                <option value="Pro PLan">Pro Plan</option>
              </select>
            </div>
            <button type="submit" class="btn btn-success">
              Submit
            </button>
          </form>
        </div>
      </div>
    </div>
  );
};

export default Show;
