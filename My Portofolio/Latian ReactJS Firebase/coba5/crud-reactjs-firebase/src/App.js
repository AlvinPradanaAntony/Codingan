import './App.css';
import AddMovie from './components/AddMovie';
import EditMovies from './components/EditMovies';
import ListMovies from './components/ListMovies';

function App() {
  return (
    <div className="App">
      <header className="App-header">
        <h3>Firebase Firestore React</h3>
      </header>
      <main>
        <ListMovies/>
        <AddMovie/>
        <EditMovies/>
      </main>
    </div>
  );
}

export default App;
