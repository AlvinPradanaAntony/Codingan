import React, { Component } from "react";

class DataClass extends Component {
  render() {
    return (
      <div className="App">
        <header className="App-header">
          <h3 className="m-0">Data Class</h3>
        </header>
        <main>
        <div className="card-body">
            <table className="table table-bordered table-striped">
              <thead>
                <tr>
                  <th>Class</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>Fisika</td>
                  <td>
                    <button className="btn btn-primary">Edit</button>
                    <button className="btn btn-danger">Hapus</button>
                  </td>
                </tr>
                <tr>
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

export default DataClass;
