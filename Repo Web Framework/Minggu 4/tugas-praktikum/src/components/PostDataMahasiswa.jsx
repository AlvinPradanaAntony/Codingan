import React from "react";

const PostDataMahasiswa = (props) => {
  const kondisionalStatus = () => {
    if (props.status === "Aktif") {
      return (
      <span class="badge bg-inverse-success">{props.status}</span>
      );
    } else if (props.status === "Lulus") {
      return (
      <span class="badge bg-inverse-danger">{props.status}</span>
      );
    } else {
      return (
      <span class="badge bg-inverse-primary">{props.status}</span>
      );
    }
  };

  return (
      <div className="col-md-4 col-sm-6 col-12 col-lg-4 col-xl-3">
        <div className="card custom-radius custom-card r-12 color-black border-0 mb-4">
          <div className="card-body p-0">
            <img src={props.gambar} className="bd-placeholder-img"></img>
            <div className="p-3">
              <h5 className="class-title text-white">Profile</h5>
              <div className="row">
                <div className="col-6">NIM :</div>
                <div className="col-6">{props.nim}</div>
                <div className="col-6">Nama :</div>
                <div className="col-6">{props.nama}</div>
                <div className="col-6">Alamat :</div>
                <div className="col-6">{props.alamat}</div>
                <div className="col-6">No. Hp :</div>
                <div className="col-6">{props.nohp}</div>
                <div className="col-6">Angkatan :</div>
                <div className="col-6">{props.angkatan}</div>
                <div className="col-6">Status :</div>
                <div className="col-6">
                  {kondisionalStatus()}
                  {/* <span class="badge bg-inverse-success">{props.status}</span> */}
                </div>
                <div className="col-12 text-center mt-4">
                  <botton className="btn delete-btn btn-danger" onClick={() => props.hapusData(props.idData)}>
                    Hapus
                  </botton>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  );
};

export default PostDataMahasiswa;
