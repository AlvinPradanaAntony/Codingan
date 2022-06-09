import React from "react";
import {Switch, Route} from 'react-router-dom'
import App from "./App";
import DataClass from "./components/DataClass";
import DataGuru from "./components/DataGuru";
import DataSiswa from "./components/DataSiswa";

function MyRouter(){
  return(
      <Switch>
          <Route path="/class" component={DataClass}></Route>
          <Route path="/siswa" component={DataSiswa}></Route>
          <Route path="/guru" component={DataGuru}></Route>
          <Route path="/" component={App}></Route>
      </Switch>
  );
}

export default MyRouter;