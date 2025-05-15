<?php

class Lab extends Controller
{
    public function index($id)
    {
        $data['title'] = 'Lab';
        $data['lab'] = $this->model('Lab_model')->getAllLab();
        $data['singleLab'] = $this->model('Lab_model')->getLabByID($id);
        $data['matkul'] = $this->model('Lab_model')->getMatkulByID($id);
        $data['kegiatan'] = $this->model('Kegiatan_model')->getAllKegiatanByLabID($id);


        // var_dump($data['singleLab']);
        $this->view('templates/header', $data);
        $this->view('lab/index', $data);
        $this->view('templates/footer');
    }
}
