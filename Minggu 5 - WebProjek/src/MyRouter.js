import React from "react";

import {Switch, Route} from 'react-router-dom'

import Dashboard from './components/Dashboard';
import App from './App'
import LandingPage from "./components/LandingPage";


function MyRouter(){
    return(
        <Switch>
            <Route path="/dashboard" component={Dashboard}></Route>
            <Route path="/" component={LandingPage}></Route>
        </Switch>
    );
}
export default MyRouter;