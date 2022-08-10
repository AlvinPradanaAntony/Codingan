<?php

class Dosen_model
{
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllDosen()
    {
        $this->db->query('select * from dosen');
        return $this->db->resultSet();
    }

    public function addNewDosen($data)
    {
        $nidn = htmlspecialchars($data['nidn']);
        $nama = htmlspecialchars($data['nama']);
        $no_telp = htmlspecialchars($data['no_telp']);
        $alamat = htmlspecialchars($data['alamat']);
        $foto = htmlspecialchars($data['foto']);

        $this->db->query('INSERT INTO dosen VALUES("", :nidn, :nama, :no_telp, :alamat, :foto, :id_publikasi, :id_pengabdian, :id_pendidikan, :jafung)');

        $this->db->bindValue('nidn', $nidn);
        $this->db->bindValue('nama', $nama);
        $this->db->bindValue('no_telp', $no_telp);
        $this->db->bindValue('alamat', $alamat);
        $this->db->bindValue('foto', $foto);
        $this->db->bindValue('id_publikasi', '');
        $this->db->bindValue('id_pengabdian', '');
        $this->db->bindValue('id_pendidikan', '');
        $this->db->bindValue('jafung', '');

        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getDosenByID($data)
    {
        $this->db->query('SELECT * FROM dosen WHERE id=:id');
        $this->db->bindValue('id', $data);
        return $this->db->single();
    }

    public function storePublikasi($data)
    {
        $tahun = htmlspecialchars($data['tahun']);
        $judul = htmlspecialchars($data['judul']);
        $dana = htmlspecialchars($data['dana']);
        $dosen_id = htmlspecialchars($data['dosen_id']);

        $this->db->query('INSERT INTO publikasi VALUES("", :tahun, :judul, :dana, :dosen_id)');
        $this->db->bindValue('tahun', $tahun);
        $this->db->bindValue('judul', $judul);
        $this->db->bindValue('dana', $dana);
        $this->db->bindValue('dosen_id', $dosen_id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function storepengabdian($data)
    {
        $tahun = htmlspecialchars($data['tahun']);
        $judul = htmlspecialchars($data['judul']);
        $dana = htmlspecialchars($data['dana']);
        $dosen_id = htmlspecialchars($data['dosen_id']);

        $this->db->query('INSERT INTO pengabdian VALUES("", :tahun, :judul, :dana, :dosen_id)');
        $this->db->bindValue('tahun', $tahun);
        $this->db->bindValue('judul', $judul);
        $this->db->bindValue('dana', $dana);
        $this->db->bindValue('dosen_id', $dosen_id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function storePendidikan($data)
    {
        $nama_pt = htmlspecialchars($data['nama_pt']);
        $prodi = htmlspecialchars($data['prodi']);
        $tahun_lulus = htmlspecialchars($data['tahun_lulus']);
        $dosen_id = htmlspecialchars($data['dosen_id']);

        $this->db->query('INSERT INTO pendidikan VALUES("", :nama_pt, :prodi, :tahun_lulus, :dosen_id)');
        $this->db->bindValue('nama_pt', $nama_pt);
        $this->db->bindValue('prodi', $prodi);
        $this->db->bindValue('tahun_lulus', $tahun_lulus);
        $this->db->bindValue('dosen_id', $dosen_id);
        $this->db->execute();

        return $this->db->rowCount();
    }

    public function getAllPublikasi($data)
    {
        $this->db->query('SELECT * FROM `publikasi` WHERE dosen_id=:dosen_id');
        $this->db->bindValue('dosen_id', $data);
        return $this->db->resultSet();
    }

    public function getAllPengabdian($data)
    {
        $this->db->query('SELECT * FROM `pengabdian` WHERE dosen_id=:dosen_id');
        $this->db->bindValue('dosen_id', $data);
        return $this->db->resultSet();
    }

    public function getAllPendidikan($data)
    {
        $this->db->query('SELECT * FROM `pendidikan` WHERE dosen_id=:dosen_id');
        $this->db->bindValue('dosen_id', $data);
        return $this->db->resultSet();
    }

    public function hapusDosen($data)
    {
        $this->db->query('DELETE FROM dosen WHERE id=:id');
        $this->db->bindValue('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deletePublikasiByDosenID($data)
    {
        $this->db->query('DELETE FROM publikasi WHERE dosen_id=:dosen_id');
        $this->db->bindValue('dosen_id', $data);
        $this->db->execute();
    }
    public function deletePendidikanByDosenID($data)
    {
        $this->db->query('DELETE FROM pendidikan WHERE dosen_id=:dosen_id');
        $this->db->bindValue('dosen_id', $data);
        $this->db->execute();
    }
    public function deletePengabdianByDosenID($data)
    {
        $this->db->query('DELETE FROM pengabdian WHERE dosen_id=:dosen_id');
        $this->db->bindValue('dosen_id', $data);
        $this->db->execute();
    }

    public function deletePendidikan($data)
    {
        $this->db->query('DELETE FROM pendidikan WHERE id=:id');
        $this->db->bindValue('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deletePengabdian($data)
    {
        $this->db->query('DELETE FROM pengabdian WHERE id=:id');
        $this->db->bindValue('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deletePublikasi($data)
    {
        $this->db->query('DELETE FROM publikasi WHERE id=:id');
        $this->db->bindValue('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
