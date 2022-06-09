import React, { Component } from "react";

class DataGuru extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <h3 className="m-0">Data Guru</h3>
        </header>
        <main>
          <div className="card-body">
            <table className="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>NIS</th>
                  <th>Nama</th>
                  <th>Kelas</th>
                  <th>Aksi</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>1</td>
                  <td>Rizki</td>
                  <td>Fisika</td>
                  <td>
                    <button className="btn btn-primary">Edit</button>
                    <button className="btn btn-danger">Hapus</button>
                  </td>
                </tr>
                <tr>
                  <td>2</td>
                  <td>Rizki</td>
                  <td>Kimia</td>
                  <td>
                    <button className="btn btn-primary">Edit</button>
                    <button className="btn btn-danger">Hapus</button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
        </main>
      </div>
    );
  }
}

export default DataGuru;