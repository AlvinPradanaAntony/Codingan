import React, { Component } from "react";
import "./BlogPost.css";
import Post from "../../components/BlogPost/Post";
import API from "../../services/index";

class BlogPost extends Component {
  handleReset = () => {
    Array.from(document.querySelectorAll("input, textarea")).forEach((input) => (input.value = ""));
    this.setState({
      insertArtikel: {
        // variable yang digunakan untuk menampung sementara data yang akan di insert
        userId: 1, // kolom userId, id, title, dan body sama, mengikuti kolom yang ada pada listArtikel.json
        id: 1,
        title: "",
        body: "",
      },
    });
  };

  state = {
    // komponen state dari React untuk statefull component
    listArtikel: [], // yariabel array yang digunakan untuk menyimpan data API
    insertArtikel: {
      // variable yang digunakan untuk menampung sementara data yang akan di insert
      userId: 1, // kolom userId, id, title, dan body sama, mengikuti kolom yang ada pada listArtikel.json
      id: 1,
      title: "",
      body: "",
    },
  };

  componentDidMount() {
    // komponen untuk mengecek ketika compnent telah di-mount-ing, maka panggil API
    this.ambilDataDariServerAPI(); // ambil data dari server API lokal
  }

  handleTambahArtikel = (event) => {
    // fungsi untuk meng-hadle form tambah data actikel
    let formInsertArtikel = { ...this.state.insertArtikel }; // clonning data state insertArtikel ke dalam variabel formInsertArtikel
    let timestamp = new Date().getTime(); // digunakan untuk menyimpan waktu (sebagai ID artikel)
    formInsertArtikel["id"] = timestamp;
    formInsertArtikel[event.target.name] = event.target.value; // menyimpan data onchange ke formInsertArtikel sesuai dengan target yg diisi
    this.setState({
      insertArtikel: formInsertArtikel,
    });
  };

  ambilDataDariServerAPI = () => {
    API.getNewsBlog().then((result) => {
      this.setState({
        listArtikel: result,
      });
    });
  };

  handleTombolSimpan = () => {
    // fungsi untuk meng-handle tombol simpan
    API.postNewsBlog(this.state.insertArtikel).then((response) => {
      this.ambilDataDariServerAPI();
    });
    this.handleReset(); // reset input setelah tombol simpan di klik
  };

  handleHapusArtikel = (data) => {
    // fungsi yang meng-handle button action hapus data
    API.deleteNewsBlog(data).then((response) => {
      this.ambilDataDariServerAPI();
    });
  };

  render() {
    return (
      <div className="post-artikel">
        <div className="form pb-2 border-bottom">
          <div className="form-group row">
            <label htmlFor="title" className="col-sm-2 col-form-label">
              Judul
            </label>
            <div className="col-sm-10">
              <input type="text" className="form-control" id="title" name="title" onChange={this.handleTambahArtikel} />
            </div>
          </div>
          <div className="form-group row">
            <label htmlFor="body" className="col-sm-2 col-form-label">
              Isi
            </label>
            <div className="col-sm-10">
              <textarea className="form-control" id="body" name="body" rows="3" onChange={this.handleTambahArtikel}></textarea>
            </div>
          </div>
          <button type="submit" className="btn btn-primary" onClick={this.handleTombolSimpan}>
            Simpan
          </button>
        </div>
        <h2>Daftar Artikel</h2>
        {this.state.listArtikel.map((artikel) => {
          // looping dan masukkan untuk setiap data yang ada di listartikel ke variabel artikel
          return <Post key={artikel.id} gambar={"https://source.unsplash.com/random/200x200?sig=" + artikel.id} judul={artikel.title} isi={artikel.body} idArtikel={artikel.id} hapusArtikel={this.handleHapusArtikel} />; // mappingkan data json dari API sesuai dengan kategorinya
        })}
      </div>
    );
  }
}

export default BlogPost;
