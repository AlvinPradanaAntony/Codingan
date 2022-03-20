import React from "react";
import "./myLogin.css";
import Logo from "./asset/logo.png"

const InputEmail = () => {
  return (
    <div>
      <label for="email" class="d-block f-14">
        Email
      </label>
      <input type="text" id="email" class="input" placeholder="Email" />
    </div>
  );
};

const InputPass = () => {
  return (
    <div>
      <label for="pass" class="d-block f-14">
        Password
      </label>
      <input type="password" id="pass" placeholder="Password" class="input InputPass" />
    </div>
  );
};

const Btn = () => {
  return (
    <button type="submit" class="btn">
      Login
    </button>
  );
};

const Login = () => {
  return (
    <body>
      <div class="container">
        <div class="panel1">
          <img src={Logo} alt="" class="customImg" />
          <p class="heading">Login to Week3Dev</p>
          <div class="position">
            <form action="">
              {InputEmail()}
              {InputPass()}
              {Btn()}
            </form>
          </div>
        </div>
      </div>
    </body>
  );
};

export default Login;
