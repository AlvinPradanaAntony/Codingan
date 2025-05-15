<?php

class Kegiatan extends Controller
{
    public function index()
    {
        $data['title'] = 'Kegiatan';
        $data['kegiatan'] = $this->model('Kegiatan_model')->getAllKegiatan();
        $data['lab'] = $this->model('Lab_model')->getAllLab();
        $this->view('dashboard/templates/header', $data);
        $this->view('dashboard/templates/sidebar');
        $this->view('dashboard/kegiatan/index', $data);
        $this->view('dashboard/templates/footer');
    }

    public function tambah()
    {
        $_POST['foto'] = $this->upload($_FILES);
        if ($this->model('Kegiatan_model')->addNewKegiatan($_POST) > 0) {
            Flasher::setFlash('Tambah Kegiatan', ' berhasil ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/kegiatan');
        } else {
            Flasher::setFlash('Tambah Kegiatan', ' gagal ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/kegiatan');
        }
    }

    public function upload($data)
    {
        // image handler
        $name = $data['foto']['name'];
        $size = $data['foto']['size'];
        $erro = $data['foto']['error'];
        $tmp_name = $data['foto']['tmp_name'];
        $extensions = ['jpg', 'png', 'jpeg'];
        $extension = explode('.', $name);
        $extension = strtolower(end($extension));

        if ($erro == 4) {
            Flasher::setFlash('Tambah foto kegiatan', ' terlebih dahulu', 'danger');
            header('Location: ' . BASE_URL . '/kegiatan');
        }

        // check extensions
        if (!in_array($extension, $extensions)) {
            Flasher::setFlash('Ekstensi ', 'tidak valid', 'danger');
            header('Location: ' . BASE_URL . '/kegiatan');
        }
        // check size
        if ($size > 1000000) {
            Flasher::setFlash('Ukuran ', 'terlalu besar', 'danger');
            header('Location: ' . BASE_URL . '/kegiatan');
        }

        // generate filename
        $newName = uniqid();
        $newName .= $newName . '.' . $extension;
        move_uploaded_file($tmp_name, "../public/img/$newName");
        return $newName;
    }

    // detail
    public function detail($id)
    {
        $data['title'] = 'Detail Kegiatan';
        $data['kegiatan'] = $this->model('Kegiatan_model')->getKegiatanByID($id);
        $data['lab'] = $this->model('Lab_model')->getLabByID($data['kegiatan']['id_lab']);
        $this->view('dashboard/templates/header', $data);
        $this->view('dashboard/templates/sidebar');
        $this->view('dashboard/kegiatan/detail', $data);
        $this->view('dashboard/templates/footer');
    }

    // hapus 
    public function hapus($id)
    {
        if ($this->model('Kegiatan_model')->deleteKegiatan($id) > 0) {
            Flasher::setFlash('Hapus Kegiatan', ' berhasil', 'success');
            header('Location: ' . BASE_URL . '/kegiatan');
        } else {
            Flasher::setFlash('Hapus Kegiatan', ' gagal', 'danger');
            header('Location: ' . BASE_URL . '/kegiatan');
        }
    }

    // edit
    public function edit($id)
    {
        $data['title'] = 'Edit Kegiatan';
        $data['kegiatan'] = $this->model('Kegiatan_model')->getKegiatanByID($id);
        $data['lab'] = $this->model('Lab_model')->getAllLab();
        $this->view('dashboard/templates/header', $data);
        $this->view('dashboard/templates/sidebar');
        $this->view('dashboard/kegiatan/edit', $data);
        $this->view('dashboard/templates/footer');
    }

    public function update()
    {
        $data['kegiatan'] = $this->model('Kegiatan_model')->getKegiatanByID($_POST['id']);

        if ($_FILES['foto']['error'] == 4) {
            $_POST['foto'] = $data['kegiatan']['foto'];
        }

        if ($this->model('Kegiatan_model')->updateKegiatan($_POST) > 0) {
            Flasher::setFlash('Update Kegiatan', ' berhasil di update!', 'success');
            header('Location: ' . BASE_URL . '/kegiatan');
        } else {
            Flasher::setFlash('Update Kegiatan', ' berhasil di update!', 'danger');
            header('Location: ' . BASE_URL . '/kegiatan');
        }
    }
}
