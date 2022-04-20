import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import { Provider } from "react-redux";
import { createStore, applyMiddleware, compose } from "redux";
import MainReducer from "./reducers/MainReducer";
import reportWebVitals from "./reportWebVitals";
import CreateTodo from "./containers/CreateTodo";
import Table from "./containers/Table";
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";

const store = compose(window.devToolsExtension ? window.devToolsExtension() : f => 
f)(createStore)(MainReducer)

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <Provider store={store}>
    <CreateTodo/>
    <Table/>
  </Provider>
);

reportWebVitals();
