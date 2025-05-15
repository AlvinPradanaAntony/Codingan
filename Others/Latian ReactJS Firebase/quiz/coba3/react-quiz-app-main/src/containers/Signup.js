import React from "react";
import { Link } from "react-router-dom";
import { TextField, Button, Typography, makeStyles } from "@material-ui/core";
import Email from "../Assets/images/email.png";



const useStyles = makeStyles((theme) => ({
  root: {
    "& > * + *": {
      marginLeft: theme.spacing(2),
    },
  },
}));

export default function Home() {
  const classes = useStyles();

  return (
    <div className="container">
      <div className="form">
        <div className="form-header">
          <div className="form-title">Create a new Account</div>
        </div>
        <div className="form-body">
          <div className="form-description">
            <p className="description-text">
              Enter your email and password
              <span className="description-text-span"> to sign in</span>
            </p>
          </div>
          <div className="form-fields">
            <div className="form-field">
              <TextField
                id="signup-email-helperText"
                label="Email"
                helperText="Please Enter your email address"
                variant="outlined"
                className="form-field"
                size="small"
              />
            </div>
            <div className="form-field">
              <TextField
                id="signup-password-helperText"
                label="Password"
                type="password"
                helperText="Please Enter your password"
                variant="outlined"
                className="form-field"
                size="small"
              />
            </div>
            <div className="form-field">
              <TextField
                id="signup-confirm-password-helperText"
                label="Confirm Password"
                type="password"
                helperText="Please confirm your password"
                variant="outlined"
                className="form-field"
                size="small"
              />
            </div>


          </div>
          <div className="buttons">
            <div>
              <Button
                variant="contained"
                color="primary"
                href="#contained-buttons"
              >
                Login
              </Button>
            </div>
            <div className="forgot-password-link">
              <Typography className={classes.root}>
                <Link to={'./forgot'} >
        Forgot your password?
      </Link>
              </Typography>
            </div>
          </div>
          <div className="social-signup">
            <Button color="primary" variant="contained" className="social-btn">
              <img src={Email} className="social-icon" alt="google icon" />
              Google
            </Button>
            <Button
              color="secondary"
              variant="contained"
              className="social-btn"
            >
              <img src={Email} className="social-icon" alt="facebook icon" />
              Facebook
            </Button>
          </div>
          <div className="create-account">
            <h4><Link to={"/"}>Sign in</Link> Instead</h4>
          </div>
        </div>
      </div>
    </div>
  );
}
