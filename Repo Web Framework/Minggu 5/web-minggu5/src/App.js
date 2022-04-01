import React from "react";
import { BrowserRouter as Router, Switch, Route, Link, useParams, useRouteMatch, Redirect, useHistory, useLocation } from "react-router-dom";

// Situs ini memiliki 3 halaman, yang semuanya dirender secara dinamis di browser.
// Meskipun halaman tidak pernah di-refresh, perhatikan bagaimana React Router
// membuat URL selalu terbarui saat Anda menavigasi situs.
// Ini menjaga riwayat browser, memastikan hal-hal seperti tombol kembali
// dan bookmark berfungsi dengan baik.
// export default function BasicExample() {
//   return (
//     <Router>
//       <div>
//         <ul>
//           <li>
//             <Link to="/">Home</Link>
//           </li>
//           <li>
//             <Link to="/about">About </Link>
//           </li>
//           <li>
//             <Link to="/dashboard">Dashboard</Link>
//           </li>
//         </ul>
//         <hr />
//         <Switch>
//           <Route exact path="/">
//             <Home />
//           </Route>
//           <Route path="/about">
//             <About />
//           </Route>
//           <Route path="/dashboard">
//             <Dashboard />
//           </Route>
//         </Switch>
//       </div>
//     </Router>
//   );
// }
// //Anda dapat menganggap komponen ini sebagai "nalaman(Konten)" di situs Anda.
// function Home() {
//   return (
//     <div>
//       <h2>Home</h2>
//     </div>
//   );
// }
// function About() {
//   return (
//     <div>
//       <h2> About </h2>
//     </div>
//   );
// }
// function Dashboard() {
//   return (
//     <div>
//       <h2>Dashboard</h2>
//     </div>
//   );
// }

// Params adalah placeholder di URL yang dimulai dengan titik dua,
//seperti param : id yang didefinisikan dalam route dalam contoh ini.
// export default function ParamsExample() {
//   return (
//     <Router>
//       <div>
//         <h2> Accounts </h2>
//         <ul>
//           <li>
//             <Link to="/netflix">Netflix</Link>
//           </li>
//           <li>
//             <Link to="/gmail">Gmail</Link>
//           </li>
//           <li>
//             <Link to="/yahoo">Yahoo</Link>
//           </li>
//           <li>
//             <Link to="/amazon">Amazon</Link>
//           </li>
//         </ul>
//         <Switch>
//           <Route path="/:id" children={<Child />} />
//         </Switch>
//       </div>
//     </Router>
//   );
// }
// function Child() {
//   let { id } = useParams();
//   return (
//     <div>
//       <h3>ID: {id}</h3>
//     </div>
//   );
// }

// Karena route adalah komponen regular react,
//sehingga dapat ditampilkan di mana saja dalam penempatannya,
//termasuk dalam child element.
// Ini akan membantu anda untuk memecah menjadi beberapa bundel
//karena pemisahan kode pada aplikasi React Router sama dengan
//pemecahan kode pada aplikasi react lainnya.
// export default function NestingExample() {
//   return (
//     <Router>
//       <div>
//         <ul>
//           <li>
//             <Link to="/">Home</Link>
//           </li>
//           <li>
//             <Link to="/topics">Topics</Link>
//           </li>
//           <li>
//             <Link to="/about">About</Link>
//           </li>
//         </ul>
//         <hr />
//         <Switch>
//           <Route exact path="/">
//             <Home />
//           </Route>
//           <Route path="/topics">
//             <Topics />
//           </Route>
//           <Route path="/about">
//             <About />
//           </Route>
//         </Switch>
//       </div>
//     </Router>
//   );
// }
// function Home() {
//   return (
//     <div>
//       <h2> Home</h2>
//     </div>
//   );
// }
// function Topics() {
//   //path untuk membuat jalur <Route> yang terhadap rute induk,
//   //sedangkan url untuk membuat link.
//   let { path, url } = useRouteMatch();
//   return (
//     <div>
//       <h2>Topics</h2>
//       <ul>
//         <li>
//           <Link to={`${url}/Sate, Nasi goreng`}>Kuliner</Link>
//         </li>
//         <li>
//           <Link to={`${url}/Wisata alam, Museum `}>Travelling</Link>
//         </li>
//         <li>
//           <Link to={`${url}/Ibis, JW Marriot`}>Review Hotel</Link>
//         </li>
//       </ul>
//       <Switch>
//         <Route exact path={path}>
//           <h3>Please select a topic.</h3>
//         </Route>
//         <Route path={`${path}/:topicId`}>
//           <Topic />
//         </Route>
//       </Switch>
//     </div>
//   );
// }

// function About() {
//   return (
//     <div>
//       <h2> About </h2>
//     </div>
//   );
// }

// function Topic() {
//   let { topicId } = useParams();
//   return (
//     <div>
//       <h3>{topicId}</h3>
//     </div>
//   );
// }

export default function AuthExample() {
  return (
    <Router>
      <div>
        <AuthButton />
        <ul>
          <li>
            <Link to="/public">Public Page</Link>
          </li>
          <li>
            <Link to="/private">Private Page</Link>
          </li>
        </ul>

        <Switch>
          <Route path="/public">
            <PublicPage />
          </Route>
          <Route path="/login">
            <LoginPage />
          </Route>
          <PrivateRoute path="/private">
            <ProtectedPage />
          </PrivateRoute>
        </Switch>
      </div>
    </Router>
  );
}

const fakeAuth = {
  isAuthenticated: false,
  authenticate(cb) {
    fakeAuth.isAuthenticated = true;
    setTimeout(cb, 100); // fake async
  },
  signout(cb) {
    fakeAuth.isAuthenticated = false;
    setTimeout(cb, 100);
  },
};

function AuthButton() {
  let history = useHistory();
  let location = useLocation();
  let { from } = location.state || { from: { pathname: "/" } };
  return fakeAuth.isAuthenticated ? (
    <p>
      Welcome!{" "}
      <button
        onClick={() => {
          fakeAuth.signout(() => history.push(from));
        }}
      >
        Sign out
      </button>
    </p>
  ) : (
    <p>You are not logged in.</p>
  );
}

// Pembungkus untuk <Route> yang mengarahkan ke login
// tampilan jika Anda belum terkonfirmasi.
function PrivateRoute({ children, ...rest }) {
  return (
    <Route
      {...rest}
      render={({ location }) =>
        fakeAuth.isAuthenticated ? (
          children
        ) : (
          <Redirect
            to={{
              pathname: "/login",
              state: { from: location },
            }}
          />
        )
      }
    />
  );
}

function PublicPage() {
  return <h3>Public</h3>;
}
function ProtectedPage() {
  return <h3>Private</h3>;
}

function LoginPage() {
  let history = useHistory();
  let location = useLocation();
  let { from } = location.state || { from: { pathname: "/" } };
  let login = () => {
    fakeAuth.authenticate(() => {
      history.replace(from);
    });
  };
  return (
    <div>
      <p> You must log in to view the page at {from.pathname}</p>
      <button onClick={login}>Log in</button>
    </div>
  );
}
