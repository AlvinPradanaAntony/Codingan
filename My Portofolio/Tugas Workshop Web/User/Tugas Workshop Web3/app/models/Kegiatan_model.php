<?php

class Kegiatan_model
{
    private $table = "kegiatan";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllKegiatan()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        $result = $this->db->resultSet();
        return $result;
    }

    public function getAllKegiatanByLabID($data)
    {
        $this->db->query('SELECT * FROM kegiatan WHERE id_lab=:id');
        $this->db->bindValue('id', $data);
        $result = $this->db->resultSet();
        return $this->db->resultSet();
    }

    public function getKegiatanByID($data)
    {
        $this->db->query("SELECT * FROM kegiatan WHERE id=:id");
        $this->db->bindValue('id', $data);
        return $this->db->single();
    }

    public function addNewKegiatan($data)
    {
        $nama_kegiatan = $data['nama_kegiatan'];
        $kategori = $data['kategori'];
        $tanggal_pelaksanaan = $data['tanggal_pelaksanaan'];
        $deskripsi = $data['deskripsi'];
        $foto = $data['foto'];
        $id_lab = $data['id_lab'];
        $this->db->query("INSERT INTO kegiatan VALUES(
            '', :nama_kegiatan, :kategori, :tanggal_pelaksanaan, :deskripsi, :foto, :id_lab
        )");
        $this->db->bindValue('nama_kegiatan', $nama_kegiatan);
        $this->db->bindValue('kategori', $kategori);
        $this->db->bindValue('tanggal_pelaksanaan', $tanggal_pelaksanaan);
        $this->db->bindValue('deskripsi', $deskripsi);
        $this->db->bindValue('foto', $foto);
        $this->db->bindValue('id_lab', $id_lab);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function deleteKegiatan($data)
    {
        $this->db->query('DELETE FROM kegiatan WHERE id=:id');
        $this->db->bindValue('id', $data);
        $this->db->execute();
        return $this->db->rowCount();
    }

    public function updateKegiatan($data)
    {
        $id = htmlspecialchars($data['id']);
        $nama_kegiatan = htmlspecialchars($data['nama_kegiatan']);
        $kategori = htmlspecialchars($data['kategori']);
        $tanggal_pelaksanaan = htmlspecialchars($data['tanggal_pelaksanaan']);
        $deskripsi = htmlspecialchars($data['deskripsi']);
        $foto = htmlspecialchars($data['foto']);
        $this->db->query('UPDATE kegiatan SET nama_kegiatan=:nama_kegiatan, kategori=:kategori, tanggal_pelaksanaan=:tanggal_pelaksanaan, deskripsi=:deskripsi, foto=:foto WHERE id=:id');
        $this->db->bindValue('nama_kegiatan', $nama_kegiatan);
        $this->db->bindValue('kategori', $kategori);
        $this->db->bindValue('tanggal_pelaksanaan', $tanggal_pelaksanaan);
        $this->db->bindValue('deskripsi', $deskripsi);
        $this->db->bindValue('foto', $foto);
        $this->db->bindValue('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
