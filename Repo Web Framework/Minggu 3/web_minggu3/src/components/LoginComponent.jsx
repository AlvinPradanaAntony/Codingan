import "bootstrap/dist/css/bootstrap.min.css";

// import react
import React from "react";
import "./LoginComponent.css";
const Title = () => {
  return <h1 className="font-weight-bold text-center my-5">Tugas Pertemuan ke-3</h1>;
};

const Formusername = () => {
  return (
    <div className="form-group mb-4">
      <input type="text" className="form-control" placeholder="Masukkan Username Anda"></input>
    </div>
  );
};

const FormPassword = () => {
  return (
    <div className="form-group">
      <input type="text" className="form-control" placeholder="Masukkan PasSword Anda"></input>
    </div>
  );
};

const RememberMe = () => {
  return (
    <div className="form-check my-4 mr-sa-2">
      <input type="checkbox" className="form-check-input"></input>
      <label className="form-check-label">Renember Me!</label>
    </div>
  );
};

const Button = () => {
  return (
    <div className="d-grid gap-2">
      <button type="submit" className="btn btn-success my-1 font-weight-bold">
        Login
      </button>
      <button type="reset" className="btn btn-danger my-1 font-weight-bold">
        Cancel
      </button>
    </div>
  );
};

const LoginComponent = () => {
  return (
    <body>
      <div className="container">
        <div className="row align-items-center vh-100 form">
          <div className="col-nd-4">
            <div className="card">
              <div className="card-header text-center">Form Login</div>
              <div classNane="card-body">
                <form>
                  {Title()}
                  {Formusername()}
                  {FormPassword()}
                  {RememberMe()}
                  {Button()}
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </body>
  );
};

export default LoginComponent;
