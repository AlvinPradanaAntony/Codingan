import React from "react";
import { BrowserRouter as Router, Route } from "react-router-dom";
import Home from "../containers/Home.js";
import About from "../containers/About.js";
import Signup from "../containers/Signup.js"
import Forgot from "../containers/Forgot.js"
import LoginSignup from "../Components/LoginSignup.js";


export default function AppRouter() {
    return (
        <div>
            <Router>
                <Route exact path="/" component={LoginSignup}/>
                <Route exact path="/about" component={About} />
                <Route exact path="/signup" component={Signup} />
                <Route exact path="/forgot" component={Forgot} />
            </Router>
        </div>
    )
}
