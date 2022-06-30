import React from "react";
import { Link } from "react-router-dom";
import { TextField, Button, Typography, makeStyles } from "@material-ui/core";

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
          <div className="form-title">Login to your Account</div>
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
                id="email-helperText"
                label="Email"
                helperText="Please Enter your email address"
                variant="outlined"
                className="form-field"
              />
            </div>
            <div className="form-field">
              <TextField
                id="password-helperText"
                label="Password"
                type="password"
                helperText="Please Enter your password"
                variant="outlined"
                className="form-field"
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
                <Link to={'/forgot'} >
        Forgot your password?
      </Link>
              </Typography>
            </div>
          </div>
          <div className="social-signup">
            <Button color="primary" variant="contained" className="social-btn">
            {/* <FontAwesomeIcon icon={faCoffee} /> */}
              Google
            </Button>
            <Button
              color="secondary"
              variant="contained"
              className="social-btn"
            >
              {/* <FontAwesomeIcon icon={faCoffee} /> */}
              Facebook
            </Button>
          </div>
          <div className="create-account">
            <h4><Link to={"/signup"}>Create a new Account</Link></h4>
          </div>
        </div>
      </div>
    </div>
  );
}
