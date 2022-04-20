import React from "react";
import ReactDOM from "react-dom/client";
import "./index.css";
import { Provider } from "react-redux";
import { createStore, applyMiddleware, compose } from "redux";
import MainReducer from "./reducers/MainReducer";
import App from "./App";
import reportWebVitals from "./reportWebVitals";

const store = compose(window.devToolsExtension ? window.devToolsExtension() : f => 
f)(createStore)(MainReducer)

const root = ReactDOM.createRoot(document.getElementById("root"));
root.render(
  <Provider store={store}>
    <App />
  </Provider>
);

reportWebVitals();
