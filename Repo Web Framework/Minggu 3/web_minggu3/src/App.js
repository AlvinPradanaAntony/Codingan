import React, { Component } from "react";
// import Footer from "./Footer";
// import Header from "./Header";
// import List from "./List";
// import HelloComponent from "./components/HelloComponent";
// import LoginComponent from "./components/LoginComponent";
import Login from "./components/myLogin";

class App extends Component {
  render() {
    return (
      // <div>
      //   <HelloComponent />
      //   <Header />
      //   <h2>Component dari Class App</h2>
      //   <List />
      //   <Footer judul="Halaman Footer" nama="Aufa" />
      // </div>
      <div>
        {/* <LoginComponent/> */}
        <Login />
      </div>
    );
  }
}

export default App;
