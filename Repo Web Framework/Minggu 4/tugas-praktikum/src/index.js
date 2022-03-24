import React from 'react';
import ReactDOM from 'react-dom';
import './index.css';
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import DataMahasiswa from "./components/container/dataMahasiswa";
import reportWebVitals from './reportWebVitals';

ReactDOM.render(
  <React.StrictMode>
    <DataMahasiswa />
  </React.StrictMode>,
  document.getElementById('content')
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
