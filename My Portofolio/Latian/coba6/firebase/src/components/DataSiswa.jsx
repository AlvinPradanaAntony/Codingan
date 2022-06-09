import React, { useState, useEffect } from "react";
import { db } from "../config/firebase-config";
import { collection, addDoc, getDocs, deleteDoc, doc, onSnapshot } from "firebase/firestore";

const DataSiswa = () => {
  const [students, setStudents] = useState([]);
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const [kelas, setClass] = useState("");
  const [date, setDate] = useState("");
  const [gender, setGender] = useState("");
  const [status, setStatus] = useState("");
  const [password, setPassword] = useState("");

  const handleSubmit = async (e) => {
    const studentsCollectionRef = collection(db, "students");
    e.preventDefault();
    if (email === "" || password === "" || name === "" || kelas === "" || date === "") {
      alert("Kolom tidak boleh kosong")
      return;
    }
    // const movieCollectionRef = collection(db, "movies");
    addDoc(studentsCollectionRef, { email, name, kelas, date, gender, status, password })
      .then((res) => {
        console.log(res.id);
      })
      .catch((err) => {
        console.log(err.message);
      });
    alert(name);
  };

  useEffect(() => {
    showData();
  }, []);

  const showData = () => {
    const studentsCollectionRef = collection(db, "students");
    const unsubscribe = onSnapshot(studentsCollectionRef, (snapshot) => {
      setStudents(snapshot.docs.map((doc) => ({ id: doc.id, ...doc.data() })));
    });
    return () => {
      unsubscribe();
    };
  };

  return (
    <div className="App">
      <header className="App-header">
        <h3 className="m-0">Data Siswa</h3>
      </header>
      <main>
        <div className="card-body">
          <div className="d-flex justify-content-end mt-1">
            <button type="button" className="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
              Add Data
            </button>
          </div>
          <table className="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Email</th>
                <th>Name</th>
                <th>className</th>
                <th>Date 0f Birth</th>
                <th>Gender</th>
                <th>Status</th>
                <th>Password</th>
                <th>Actions</th>
              </tr>
            </thead>
            <tbody>
              {students.map((student) => {
                return (
                  <tr key={student.id}>
                    <td>{student.email}</td>
                    <td>{student.name}</td>
                    <td>{student.className}</td>
                    <td>{student.date}</td>
                    <td>{student.gender}</td>
                    <td>{student.status}</td>
                    <td>{student.password}</td>
                    <td>
                      <button className="btn btn-primary me-2">Edit</button>
                      <button className="btn btn-danger">Hapus</button>
                    </td>
                  </tr>
                );
              })}
            </tbody>
          </table>
        </div>

        <div className="modal fade" id="exampleModal" tabIndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div className="modal-dialog">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title" id="exampleModalLabel">
                  Tambah Data
                </h5>
                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form onSubmit={handleSubmit}>
                <div className="modal-body row g-3">
                  <div className="col-md-12">
                    <label htmlFor="email" className="form-label">
                      Email
                    </label>
                    <input type="text" className="form-control" id="email" onChange={(e) => setEmail(e.target.value)} required />
                  </div>
                  <div className="col-md-12">
                    <label htmlFor="password" className="form-label">
                      Password
                    </label>
                    <input type="password" className="form-control" id="password" onChange={(e) => setPassword(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="name" className="form-label">
                      Name
                    </label>
                    <input type="text" className="form-control" id="name" onChange={(e) => setName(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="className" className="form-label">
                      className
                    </label>
                    <input type="text" className="form-control" id="className" onChange={(e) => setClass(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="date" className="form-label">
                      Date of Birth
                    </label>
                    <input type="date" className="form-control" id="date" onChange={(e) => setDate(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="gender" className="form-label">
                      Gender
                    </label>
                    <select defaultValue="" className="form-select" id="gender" onChange={(e) => setGender(e.target.value)} required>
                      <option value="" disabled>
                        Choose Gender
                      </option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div className="col-md-12">
                    <label htmlFor="status" className="form-label">
                      Status
                    </label>
                    <select defaultValue="" className="form-select" id="status" onChange={(e) => setStatus(e.target.value)} required>
                      <option value="" disabled>
                        Choose Plan
                      </option>
                      <option value="Free Plan">Free Plan</option>
                      <option value="Personal Plan">Personal Plan</option>
                      <option value="Pro PLan">Pro Plan</option>
                    </select>
                  </div>
                </div>
                <div className="modal-footer">
                  <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" className="btn btn-primary">
                    Submit
                  </button>
                </div>
              </form>
            </div>
          </div>
        </div>
      </main>
    </div>
  );
};

export default DataSiswa;
