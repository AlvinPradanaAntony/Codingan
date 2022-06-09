import React, { useState, useEffect } from "react";
import { db } from "../config/firebase-config";
import { collection, addDoc, getDocs, deleteDoc, doc, onSnapshot, updateDoc } from "firebase/firestore";
import ActionsFirebaseStudents from "../services/actionsCRUD";

const DataSiswa = () => {
  const [students, setStudents] = useState([]);
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const [kelas, setClass] = useState("");
  const [date, setDate] = useState("");
  const [gender, setGender] = useState("");
  const [status, setStatus] = useState("");
  const [password, setPassword] = useState("");
  const [id, setId] = useState("");

  const field = {
    email,
    name,
    class: kelas,
    date,
    gender,
    status,
    password,
  };

  const addData = (e) => {
    e.preventDefault();
    // if (email === "" || password === "" || name === "" || kelas === "" || date === "") {
    //   alert("Kolom tidak boleh kosong");
    //   return;
    // }
    try {
      ActionsFirebaseStudents.addStudents(field);
    } catch (error) {
      console.log(error);
    }
    alert("Berhasil menambahkan data");
  };

  const updateUser = async (id, email, name, kelas, date, gender, status, password) => {
    setId(id);
    setEmail(email);
    setName(name);
    setClass(kelas);
    setDate(date);
    setGender(gender);
    setStatus(status);
    setPassword(password);
  };

  const editUser = async () => {
    const studentsCollectionRef = doc(db, "students", id);
    updateDoc(studentsCollectionRef, { name, email, class: kelas, date, status, password })
      .then((response) => {
        console.log(response);
      })
      .catch((error) => console.log(error.message));
  };

  const deleteData = async (id, name) => {
    const studentsCollectionRef = doc(db, "students", id);
    await deleteDoc(studentsCollectionRef)
      .then(() => {
        console.log("Document Deleted");
        alert(`Berhasil menghapus user ${name}`);
      })
      .catch((error) => console.log(error.message));
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
            <button type="button" className="btn btn-primary" data-bs-toggle="modal" data-bs-target="#addModal">
              Add Data
            </button>
          </div>
          <table className="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Email</th>
                <th>Name</th>
                <th>class</th>
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
                    <td>{student.class}</td>
                    <td>{student.date}</td>
                    <td>{student.gender}</td>
                    <td>{student.status}</td>
                    <td>{student.password}</td>
                    <td>
                      <button className="btn btn-primary me-2" data-bs-toggle="modal" data-bs-target="#editModal" onClick={() => updateUser(student.id, student.email, student.name, student.class, student.date, student.gender, student.status, student.password)}>
                        Edit
                      </button>
                      <button className="btn btn-danger" onClick={() => deleteData(student.id, student.name)}>
                        Hapus
                      </button>
                    </td>
                  </tr>
                );
              })}
            </tbody>
          </table>
        </div>

        <div className="modal fade" id="addModal" tabIndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div className="modal-dialog">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title" id="exampleModalLabel">
                  Tambah Data
                </h5>
                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form onSubmit={addData}>
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
                    <label htmlFor="class" className="form-label">
                      class
                    </label>
                    <select defaultValue="" className="form-select" id="class" onChange={(e) => setClass(e.target.value)} required>
                      <option value="" disabled>
                        Choose class
                      </option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
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

        <div className="modal fade" id="editModal" tabIndex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div className="modal-dialog">
            <div className="modal-content">
              <div className="modal-header">
                <h5 className="modal-title" id="exampleModalLabel">
                  Edit Data
                </h5>
                <button type="button" className="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form onSubmit={addData}>
                <div className="modal-body row g-3">
                  <div className="col-md-12">
                    <label htmlFor="email" className="form-label">
                      Email
                    </label>
                    <input type="text" value={email} className="form-control" id="email" onChange={(e) => setEmail(e.target.value)} required />
                  </div>
                  <div className="col-md-12">
                    <label htmlFor="password" className="form-label">
                      Password
                    </label>
                    <input type="password" value={password} className="form-control" id="password" onChange={(e) => setPassword(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="name" className="form-label">
                      Name
                    </label>
                    <input type="text" value={name} className="form-control" id="name" onChange={(e) => setName(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="class" className="form-label">
                      class
                    </label>
                    <select defaultValue="" value={kelas} className="form-select" id="class" onChange={(e) => setClass(e.target.value)} required>
                      <option value="" disabled>
                        Choose class
                      </option>
                      <option value="10">10</option>
                      <option value="11">11</option>
                      <option value="12">12</option>
                    </select>
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="date" className="form-label">
                      Date of Birth
                    </label>
                    <input type="date" value={date} className="form-control" id="date" onChange={(e) => setDate(e.target.value)} required />
                  </div>
                  <div className="col-md-6">
                    <label htmlFor="gender" className="form-label">
                      Gender
                    </label>
                    <select defaultValue="" value={gender} className="form-select" id="gender" onChange={(e) => setGender(e.target.value)} required>
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
                    <select defaultValue="" value={status} className="form-select" id="status" onChange={(e) => setStatus(e.target.value)} required>
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
