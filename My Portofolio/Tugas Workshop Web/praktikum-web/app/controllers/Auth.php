<?php

class Auth extends Controller
{

    private $username = '';
    private $password = '';

    public function login()
    {
        if (isset($_COOKIE['username']) && isset($_COOKIE['password'])) {
            $this->username = $_COOKIE['username'];
            $this->password = $_COOKIE['password'];
        }
        $data['user_credential'] = [
            'username' => $this->username,
            'password' => $this->password
        ];
        $data['lab'] = $this->model('Lab_model')->getAllLab();
        $data['title'] = 'Login';
        $this->view('templates/header', $data);
        $this->view('auth/login', $data);
        $this->view('templates/footer');
    }

    public function sign_in()
    {
        $data = $this->model('Auth_model')->loginFunction($_POST);
        if ($data == 0) {
            Flasher::setFlash('Password ', 'salah', 'danger');
            header('Location:' . BASE_URL . '/auth/login');
            exit;
        } else {
            if ($data['role_id'] == 1) {
                $_SESSION['user_session'] = $data['username'];
                header('Location:' . BASE_URL . '/dashboard');
                exit;
            }
        }
    }

    // show register form
    /*public function register()
    {
        $data['lab'] = $this->model('Lab_model')->getAllLab();
        $data['title'] = 'Register';
        $this->view('templates/header', $data);
        $this->view('auth/register');
        $this->view('templates/footer');
    }
    */

    // store register data
    /*public function store()
    {

        if ($this->model('Auth_model')->getUser($_POST) > 0) {
            Flasher::setFlash('User ', 'sudah ada', 'danger');
            header('Location:' . BASE_URL . '/auth/register');
            exit;
        } else {
            if ($this->model('Auth_model')->registerAccount($_POST) > 0) {
                Flasher::setFlash('User baru berhasil ', 'ditambahkan', 'success');
                header('Location:' . BASE_URL . '/auth/register');
                exit;
            } else {
                Flasher::setFlash('User baru gagal ', 'ditambahkan', 'danger');
                header('Location:' . BASE_URL . '/auth/register');
                exit;
            }
        }
    }
    */

    public function logout()
    {
        unset($_SESSION['user_session']);
        setcookie('username', '', 0, 'http://localhost/praktikum-web/public/');
        setcookie('password', '', 0, 'http://localhost/praktikum-web/public/');
        Flasher::setFlash('Anda berhasil ', 'logout', 'success');
        header('Location: ' . BASE_URL);
    }
}
