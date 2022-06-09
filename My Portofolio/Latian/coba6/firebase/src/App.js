import { Link } from "react-router-dom";
import "./App.css";

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <h3 className="m-0">List Menu</h3>
      </header>
      <main>
        <div className="container pt-2">
          <div class="list-group">
            <Link to="/class" className="text-decoration-none">
              <button type="button" className="list-group-item list-group-item-action" aria-current="true">
                Data Class
              </button>
            </Link>
            <Link to="/siswa" className="text-decoration-none">
              <button type="button" class="list-group-item list-group-item-action">
                Data Siswa
              </button>
            </Link>
            <Link to="/guru" className="text-decoration-none">
              <button type="button" class="list-group-item list-group-item-action">
                Data Guru
              </button>
            </Link>
          </div>
        </div>
      </main>
    </div>
  );
}

export default App;
