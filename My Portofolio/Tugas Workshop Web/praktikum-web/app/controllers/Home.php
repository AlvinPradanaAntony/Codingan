<?php

class Home extends Controller
{
    public function index()
    {
        $data['title'] = 'Home';
        // lab
        $data['lab'] = $this->model('Lab_model')->getAllLab();
        // kegiatan
        $data['kegiatan'] = $this->model('Kegiatan_model')->getAllKegiatan();

        $this->view('templates/header', $data);
        $this->view('home/index', $data);
        $this->view('templates/footer');
    }
}
