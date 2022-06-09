import React, { useState, useEffect } from "react";
import { db } from "../config/firebase-config";
import { collection, getDocs, deleteDoc, doc, onSnapshot } from "firebase/firestore";

const DataSiswa = () => {
  const [students, setStudents] = useState([]);
  const [email, setEmail] = useState("");
  const [name, setName] = useState("");
  const [kelas, setClass] = useState("");
  const [date, setDate] = useState("");
  const [gender, setGender] = useState("");
  const [status, setStatus] = useState("");

  const handleSubmit = async (e) => {
    e.preventDefault();
    setMessage("");
    if (title === "" || author === "") {
      setMessage({ error: true, msg: "All fields are mandatory!" });
      return;
    }
    const newBook = {
      title,
      author,
      status,
    };
    console.log(newBook);

    try {
      if (id !== undefined && id !== "") {
        await BookDataService.updateBook(id, newBook);
        setBookId("");
        setMessage({ error: false, msg: "Updated successfully!" });
      } else {
        await BookDataService.addBooks(newBook);
        setMessage({ error: false, msg: "New Book added successfully!" });
      }
    } catch (err) {
      setMessage({ error: true, msg: err.message });
    }

    setTitle("");
    setAuthor("");
  };

  
  useEffect(() => {
    showData();
  }, []);

  const showData = () =>{
    const studentsCollectionRef = collection(db, "students");
    const unsubscribe = onSnapshot(studentsCollectionRef, (snapshot) => {
      setStudents(snapshot.docs.map((doc) => ({ id: doc.id, ...doc.data() })));
    });
    return () => {
      unsubscribe();
    };
  }

  return (
    <div className="App">
      <header className="App-header">
        <h3 className="m-0">Data Siswa</h3>
      </header>
      <main>
        <div className="card-body">
          <div className="d-flex justify-content-end mt-1">
            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="@mdo">
              Add Data
            </button>
          </div>
          <table className="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Email</th>
                <th>Name</th>
                <th>Class</th>
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
                      <button className="btn btn-primary me-2">Edit</button>
                      <button className="btn btn-danger">Hapus</button>
                    </td>
                  </tr>
                );
              })}
            </tbody>
          </table>
        </div>

        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">
                  Tambah Data
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <form>
                <div class="modal-body row g-3">
                  <div class="col-md-12">
                    <label for="email" class="form-label">
                      Email
                    </label>
                    <input type="text" class="form-control" id="email" required />
                  </div>
                  <div class="col-md-12">
                    <label for="password" class="form-label">
                      Password
                    </label>
                    <input type="password" class="form-control" id="password" required />
                  </div>
                  <div class="col-md-6">
                    <label for="name" class="form-label">
                      Name
                    </label>
                    <input type="text" class="form-control" id="name" required />
                  </div>
                  <div class="col-md-6">
                    <label for="class" class="form-label">
                      Class
                    </label>
                    <input type="text" class="form-control" id="class" required />
                  </div>
                  <div class="col-md-6">
                    <label for="date" class="form-label">
                      Date of Birth
                    </label>
                    <input type="date" class="form-control" id="date" required />
                  </div>
                  <div class="col-md-6">
                    <label for="gender" class="form-label">
                      Gender
                    </label>
                    <select class="form-select" id="gender" required>
                      <option selected disabled>
                        Choose Gender
                      </option>
                      <option value="Laki-laki">Laki-laki</option>
                      <option value="Perempuan">Perempuan</option>
                    </select>
                  </div>
                  <div class="col-md-12">
                    <label for="status" class="form-label">
                      Gender
                    </label>
                    <select class="form-select" id="status" required>
                      <option selected disabled>
                        Choose Plan
                      </option>
                      <option value="Free Plan">Free Plan</option>
                      <option value="Personal Plan">Personal Plan</option>
                      <option value="Pro PLan">Pro Plan</option>
                    </select>
                  </div>
                </div>
                <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                    Close
                  </button>
                  <button type="submit" class="btn btn-primary">
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
