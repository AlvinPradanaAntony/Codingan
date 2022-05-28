import React, { useState } from 'react';
import ReactDOM from 'react-dom';
import { Switch, BrowserRouter as Router, Route } from 'react-router-dom';
import routes from './routes';
import Header from './Header';
import "bootstrap/dist/css/bootstrap.min.css";
import "bootstrap/dist/js/bootstrap.bundle.min.js";
import firebase from "firebase/compat/app";
import firebaseConfig from './firebase.config';
import './styles.css';

firebase.initializeApp(firebaseConfig);

export const AuthContext = React.createContext(null);

function App() {
  const [isLoggedIn, setLoggedIn] = useState(false);

  return (
    <AuthContext.Provider value={{ isLoggedIn, setLoggedIn }}>
      is Logged in? {JSON.stringify(isLoggedIn)}
      <div className='App'>
        <Router>
          <Header />
          <Switch>
            {routes.map(route => (
              <Route
                key={route.path}
                path={route.path}
                exact={route.exact}
                component={route.main}
              />
            ))}
          </Switch>
        </Router>
      </div>
    </AuthContext.Provider>
  );
}


const rootElement = document.getElementById("root");
ReactDOM.render(<App />, rootElement)