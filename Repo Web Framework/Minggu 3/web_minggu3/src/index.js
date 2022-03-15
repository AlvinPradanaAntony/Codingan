import React from "react";
import ReactDOM from "react-dom";
import "./index.css";
import App from "./App";
import reportWebVitals from "./reportWebVitals";

// function HelloComponent(){
//   return <h1>Hello Component</h1>;
// }

// class StateFullComponent extends React.Component{
//   render(){
//     return <p>StateFullComponent</p>
//   }
// }

// class PercobaanKonstruktor extends React.Component{
//   constructor(){
//     super();
//     this.state={name: "Hallo Mahasiswa Polije"}
//   }

//   render(){
//     return <p>Hello</p>
//   }
// }

// State
// class PercobaanState extends React.Component{
//   constructor(){
//     super ();
//     this.state={
//       judul1: "Ayo Belajar React",
//       judul2: "Bersama mahasiswa Politeknik"
//     };
//   }

//   changeJudul2 = () => {
//     this.setState({
//       judul2: "Saya suka coding"
//     });
//   }

//   render(){
//     return(
//       <div>
//         <h1>{this.state.judul1}</h1>
//         <h2>{this.state.judul2}</h2>
//         <button onClick={this.changeJudul2}>Update Judul 2</button>
//       </div>
//     )
//   }
// }

// Props
// function Welcome(props) {
//   return <h1>Hello, {props.name}</h1>;
// }

// function Nama() {
//   return (
//     <div>
//       <Welcome name="Vivin" />
//       <Welcome name="Ayu" />
//       <Welcome name="Lestari" />
//     </div>
//   );
// }

// Lifrcycle Component
// class Test extends React.Component {
//   constructor(props) {
//     super(props);
//     this.state = { hello: "World!" };
//   }
//   componentWillMount() {
//     console.log("componentWillMount()");
//   }
//   componentDidMount() {
//     console.log("componentDidMount()");
//   }
//   changeState() {
//     this.setState({ hello: "Geek!" });
//   }
//   render() {
//     return (
//       <div>
//         <h1>GeeksForGeeks.org, Hello{this.state.hello}</h1>
//         <h2>
//           <a onClick={this.changeState.bind(this)}>Press Here!</a>
//         </h2>
//       </div>
//     );
//   }
//   shouldComponentUpdate(nextProps, nextState) {
//     console.log("shouldComponentUpdate()");
//     return true;
//   }
//   componentWillUpdate() {
//     console.log("componentWillUpdate()");
//   }
//   componentDidUpdate() {
//     console.log("componentDidUpdate()");
//   }
// }

ReactDOM.render(
  <React.StrictMode>
    {/* <HelloComponent /> */}
    {/* <StateFullComponent />
    <PercobaanKonstruktor /> */}
    {/* <PercobaanState /> */}
    {/* <Nama /> */}
    {/* <Test /> */}
    <App />
  </React.StrictMode>,
  document.getElementById("root")
);

// If you want to start measuring performance in your app, pass a function
// to log results (for example: reportWebVitals(console.log))
// or send to an analytics endpoint. Learn more: https://bit.ly/CRA-vitals
reportWebVitals();
