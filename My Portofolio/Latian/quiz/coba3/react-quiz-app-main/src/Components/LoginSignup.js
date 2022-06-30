import React from "react";
import Input from "../Components/Form/Input";
import Button from "../Components/Form/Button";
import SocialBtn from "./Form/SocialBtn";
function LoginSignup() {
  return (
    <div className="container">
      <div className="singuploginform">
        <div className="form-title">Sign In</div>
        <div className="form-description">New User? Create an account</div>
        <div className="form-inputs">
          <Input
            type="email"
            placeholder="Email address"
            className="form-control"
          />
          <Input
            type="password"
            placeholder="Password"
            className="form-control"
          />
        </div>
        <div className="form-buttons">
          <div className="forgot-password">Forgot Password</div>
          <div>
            <Button btnText="Login" className="login-btn" />
          </div>
        </div>
        <div className="line">
          <hr />
        </div>
        <div className="socialSignups">
          <SocialBtn btnText="Sign in with Google" />
          <SocialBtn btnText="Sign in with Facebook" />
          <SocialBtn btnText="Sign in with Apple" />
        </div>
      </div>
    </div>
  );
}

export default LoginSignup;
