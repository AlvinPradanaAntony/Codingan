import React, { Component } from "react";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import "./dataMahasiswa.css";
import { faPlus } from "@fortawesome/free-solid-svg-icons";
import PostDataMahasiswa from "../PostDataMahasiswa";

// buat class dataMahasiswa yang extends dari Component
class DataMahasiswa extends Component {
  handleReset = () => {
    Array.from(document.querySelectorAll("input, textarea, select")).forEach((input) => (input.value = ""));
    this.setState({
      insertData: {
        // variable yang digunakan untuk menampung sementara data yang akan di insert
        id: 1, // kolom userId, id, title, dan body sama, mengikuti kolom yang ada pada listArtikel.json
        nim: "",
        nama: "",
        alamat: "",
        hp: "",
        angkatan: "",
        status: "",
      },
    });
  };

  state = {
    // komponen state dari React untuk statefull component
    listData: [], // yariabel array yang digunakan untuk menyimpan data API
    insertData: {
      // variable yang digunakan untuk menampung sementara data yang akan di insert
      idUser: 1, // kolom userId, id, title, dan body sama, mengikuti kolom yang ada pada listArtikel.json
      nim: "",
      nama: "",
      alamat: "",
      hp: "",
      angkatan: "",
      status: "",
    },
  };

  ambilDataDariServerAPI = () => {
    fetch("http://localhost:3003/mahasiswa?_sort=NIM&_order=asc") // alamat URL API yang ingin kita anbil datanya
      .then((response) => response.json()) // ubah response data dari URL API menjadi sebuah data json
      .then((jsonHasilAmbilDariAPI) => {
        // data json hasil ambil dari API kita masukkan ke dalam listartikel pada state
        this.setState({
          listData: jsonHasilAmbilDariAPI,
        });
      });
  };

  componentDidMount() {
    // komponen untuk mengecek ketika compnent telah di-mount-ing, maka panggil API
    this.ambilDataDariServerAPI(); // ambil data dari server API lokal
  }

  handleHapusData = (data) => {
    // fungsi yang meng-handle button action hapus data
    fetch(`http://localhost:3003/mahasiswa/${data}`, { method: "DELETE" }) // alamat URL API yang ingin kita HAPUS datanya
      .then((res) => {
        // ketika proses hapus berhasil, maka ambil data dari server API lokal
        this.ambilDataDariServerAPI();
      });
  };

  handleTambahData = (event) => {
    // fungsi untuk meng-hadle form tambah data actikel
    let formInsertData = { ...this.state.insertData }; // clonning data state insertArtikel ke dalam variabel formInsertArtikel
    let timestamp = new Date().getTime(); // digunakan untuk menyimpan waktu (sebagai ID artikel)
    formInsertData["id"] = timestamp;
    formInsertData[event.target.name] = event.target.value; // menyimpan data onchange ke formInsertArtikel sesuai dengan target yg diisi
    this.setState({
      insertData: formInsertData,
    });
  };

  handleTombolSimpan = () => {
    // fungsi untuk meng-handle tombol simpan
    fetch("http://localhost:3003/mahasiswa", {
      method: "post", // method POST untuk input/insert data
      headers: {
        Accept: "application/json",
        "Content-Type": "application/json",
      },
      body: JSON.stringify(this.state.insertData), // kicimkan ke body request untuk data artikel yang akan ditambahkan (insert)
    }).then((Response) => {
      this.ambilDataDariServerAPI(); // reload / refresh data
    });
    this.handleReset(); // reset input setelah tombol simpan di klik
  };

  render() {
    return (
      <div>
        <div className="card custom-radius color-black shadow mb-4">
          <div className="card-body">
            <h4 class="card-title text-center text-white">Data Mahasiswa</h4>
          </div>
        </div>
        <div className="card custom-radius shadow border-0 color-black">
          <div className="card-header">
            <h4 className="d-inline-block">List</h4>
            <a href="#" className="btn add-btn" data-bs-toggle="modal" data-bs-target="#add_mahasiswa">
              <FontAwesomeIcon icon={faPlus} id="iconPlus" /> Add Client
            </a>

            {/* Modal  */}
            <div className="modal fade custom-modal" id="add_mahasiswa" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div className="modal-dialog">
                <div className="modal-content">
                  <div className="modal-header">
                    <h5 className="modal-title fw-bold">Tambah Mahasiswa</h5>
                    <button type="button" className="close btn-danger" data-bs-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">×</span>
                    </button>
                  </div>
                  <div className="modal-body">
                    <div class="row">
                      <div class="col-md-12">
                        <div class="form-group">
                          <label class="col-form-label">
                            NIM <span class="text-danger">*</span>
                          </label>
                          <input class="form-control" type="text" id="nim" name="nim" onChange={this.handleTambahData} />
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label">Nama</label>
                          <input class="form-control" type="text" id="nama" name="nama" onChange={this.handleTambahData}/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label">
                            Alamat<span class="text-danger">*</span>
                          </label>
                          <input class="form-control" type="text" id="alamat" name="alamat" onChange={this.handleTambahData}/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label">
                            No. Hp <span class="text-danger">*</span>
                          </label>
                          <input class="form-control" type="number" id="hp" name="hp" onChange={this.handleTambahData}/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label">Angkatan</label>
                          <input class="form-control" type="number" id="angkatan" name="angkatan" onChange={this.handleTambahData}/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <label class="col-form-label">Status</label>
                          <select class="form-select" aria-label="Default select example" id="status" name="status" onChange={this.handleTambahData}>
                            <option selected>Pilih Status</option>
                            <option value="Aktif">Aktif</option>
                            <option value="Lulus">Lulus</option>
                          </select>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div className="modal-footer">
                    <button type="button" className="btn btn-secondary" data-bs-dismiss="modal">
                      Keluar
                    </button>
                    <button type="button" className="btn btn-primary" onClick={this.handleTombolSimpan}>
                      Simpan
                    </button>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div className="card-body custom-bodyCard">
            <div className="row">
              {this.state.listData.map((dataMahasiswa) => {
                // looping dan masukkan untuk setiap data yang ada di listartikel ke variabel artikel
                return (
                  <PostDataMahasiswa
                    key={dataMahasiswa.id}
                    gambar={"https://source.unsplash.com/random/200x200?sig=" + dataMahasiswa.id}
                    nim={dataMahasiswa.nim}
                    nama={dataMahasiswa.nama}
                    alamat={dataMahasiswa.alamat}
                    nohp={dataMahasiswa.hp}
                    angkatan={dataMahasiswa.angkatan}
                    status={dataMahasiswa.status}
                    idData={dataMahasiswa.id}
                    hapusData={this.handleHapusData}
                  />
                ); // mappingkan data json dari API sesuai dengan kategorinya
              })}
            </div>
          </div>
        </div>
      </div>
    );
  }
}

export default DataMahasiswa;
