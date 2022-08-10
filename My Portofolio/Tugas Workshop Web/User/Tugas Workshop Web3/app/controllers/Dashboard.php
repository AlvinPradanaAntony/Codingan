<?php

class Dashboard extends Controller
{
    public function __construct()
    {
        // if (!isset($_SESSION['user_session'])) {
        //     header('Location: ' . BASE_URL . '/home');
        // }
    }
    public function index()
    {
        $data['title'] = 'Dashboard';
        $data['nama'] = $_SESSION['user_session'];
        $this->view('dashboard/templates/header', $data);
        $this->view('dashboard/templates/sidebar');
        $this->view('dashboard/index', $data);
        $this->view('dashboard/templates/footer');
    }
}
