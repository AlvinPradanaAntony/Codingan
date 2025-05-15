<?php

class Lab_model
{

    private $table = "lab";
    private $db;

    public function __construct()
    {
        $this->db = new Database;
    }

    public function getAllLab()
    {
        $this->db->query("SELECT * FROM " . $this->table);
        return $this->db->resultSet();
    }

    public function getLabByID($id)
    {
        $this->db->query("SELECT * FROM lab WHERE id=:id");
        $this->db->bindValue('id', $id);
        return $this->db->single();
    }

    public function getMatkulByID($id)
    {
        $this->db->query("SELECT nama FROM `mata_kuliah` WHERE mata_kuliah.id_lab=:id");
        $this->db->bindValue('id', $id);
        return $this->db->resultSet();
    }
}
