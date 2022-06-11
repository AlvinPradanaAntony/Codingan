import React from "react";
import { Route, Redirect } from "react-router-dom";

const ProtectedRoute = ({ auth, component: Component, ...rest }) => {
  return (
    <Route
      {...rest}
      render={(props) => {
        return auth? <Component {...props} />:<Redirect to={{ path: "/", state: { from: props.location } }} />
      }}
    />
  );
};

export default ProtectedRoute;
