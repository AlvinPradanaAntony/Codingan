<?php

class Dosen extends Controller
{
    public function __construct()
    {
        // if (!isset($_SESSION['user_session'])) {
        //     header('Location: ' . BASE_URL . '/home');
        // }
    }

    public function index()
    {
        $data['title'] = 'Dosen';
        $data['dosen'] = $this->model('Dosen_model')->getAllDosen();
        $dosens = $data['dosen'];
        $rowsDosen = [];
        $rowsDosen['dosen'] = [];
        if (sizeof($dosens) > 0) {
            foreach ($dosens as $dosen) {
                $row = [
                    "id" => $dosen['id'],
                    "nidn" => $dosen['nidn'],
                    "nama" => $dosen['nama'],
                    "no_telp" => $dosen['no_telp'],
                ];
            }
            array_push($rowsDosen['dosen'], $row);
        }

        echo json_encode($rowsDosen);
        die();

        $this->view('dashboard/templates/header', $data);
        $this->view('dashboard/templates/sidebar');
        $this->view('dashboard/dosen/index', $data);
        $this->view('dashboard/templates/footer');
    }

    public function store()
    {
        $_POST['foto'] = $this->upload($_FILES);
        if ($this->model('Dosen_model')->addNewDosen($_POST) > 0) {
            Flasher::setFlash('Dosen', ' berhasil ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/dosen');
        } else {
            Flasher::setFlash('Dosen', ' gagal ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/dosen');
        }
    }

    public function upload($data)
    {
        $name = $data['foto']['name'];
        $size = $data['foto']['size'];
        $erro = $data['foto']['error'];
        $tmp_name = $data['foto']['tmp_name'];
        $extensions = ['jpg', 'png', 'jpeg'];
        $extension = explode('.', $name);
        $extension = strtolower(end($extension));

        if ($erro == 4) {
            Flasher::setFlash('Tambah foto dosen', ' terlebih dahulu', 'danger');
            header('Location: ' . BASE_URL . '/dosen');
        }

        // check extensions
        if (!in_array($extension, $extensions)) {
            Flasher::setFlash('Ekstensi ', 'tidak valid', 'danger');
            header('Location: ' . BASE_URL . '/dosen');
        }
        // check size
        if ($size > 1000000) {
            Flasher::setFlash('Ukuran ', 'terlalu besar', 'danger');
            header('Location: ' . BASE_URL . '/dosen');
        }

        // generate filename
        $newName = uniqid();
        $newName .= $newName . '.' . $extension;
        move_uploaded_file($tmp_name, "../public/img/$newName");
        return $newName;
    }

    // view of detail dosen
    public function detail($id)
    {
        $data['dosen'] = $this->model('Dosen_model')->getDosenByID($id);
        $data['publikasi'] = $this->model('Dosen_model')->getAllPublikasi($id);
        $data['pengabdian'] = $this->model('Dosen_model')->getAllPengabdian($id);
        $data['pendidikan'] = $this->model('Dosen_model')->getAllPendidikan($id);
        $data['title'] = 'Detail Dosen';
        $this->view('dashboard/templates/header', $data);
        $this->view('dashboard/templates/sidebar');
        $this->view('dashboard/dosen/detail', $data);
        $this->view('dashboard/templates/footer');
    }

    public function publikasi()
    {
        // store data to database
        if ($this->model('Dosen_model')->storePublikasi($_POST) > 0) {
            Flasher::setFlash('Data publikasi ', 'berhasil ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/dosen/detail/' . $_POST['dosen_id']);
        } else {
            Flasher::setFlash('Data publikasi ', 'gagal ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/dosen/detail/' . $_POST['dosen_id']);
        }
    }

    public function pengabdian()
    {
        // store data to database
        if ($this->model('Dosen_model')->storepengabdian($_POST) > 0) {
            Flasher::setFlash('Data pengabdian ', 'berhasil ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/dosen/detail/' . $_POST['dosen_id']);
        } else {
            Flasher::setFlash('Data pengabdian ', 'gagal ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/dosen/detail/' . $_POST['dosen_id']);
        }
    }

    public function pendidikan()
    {
        // store data to database
        if ($this->model('Dosen_model')->storePendidikan($_POST) > 0) {
            Flasher::setFlash('Data pendidikan ', 'berhasil ditambahkan', 'success');
            header('Location: ' . BASE_URL . '/dosen/detail/' . $_POST['dosen_id']);
        } else {
            Flasher::setFlash('Data pendidikan ', 'gagal ditambahkan', 'danger');
            header('Location: ' . BASE_URL . '/dosen/detail/' . $_POST['dosen_id']);
        }
    }

    // hapus dosen
    public function hapus($id)
    {
        // hapus data dosen
        $this->model('Dosen_model')->deletePublikasiByDosenID($id);
        $this->model('Dosen_model')->deletePendidikanByDosenID($id);
        $this->model('Dosen_model')->deletePengabdianByDosenID($id);
        if ($this->model('Dosen_model')->hapusDosen($id) > 0) {
            Flasher::setFlash('Data dosen ', 'berhasil dihapus', 'success');
            header('Location: ' . BASE_URL . '/dosen');
        } else {
            Flasher::setFlash('Data dosen ', 'gagal dihapus', 'danger');
            header('Location: ' . BASE_URL . '/dosen');
        }
    }


    // hapus data pendidikan
    public function hapusPendidikan($id)
    {
        // hapus data dosen
        if ($this->model('Dosen_model')->deletePendidikan($id) > 0) {
            Flasher::setFlash('Data dosen ', 'berhasil dihapus', 'success');
            header('Location: ' . BASE_URL . '/dosen');
        } else {
            Flasher::setFlash('Data dosen ', 'gagal dihapus', 'danger');
            header('Location: ' . BASE_URL . '/dosen');
        }
    }
    // hapus data Pengabdian
    public function hapusPengabdian($id)
    {
        // hapus data dosen
        if ($this->model('Dosen_model')->deletePengabdian($id) > 0) {
            Flasher::setFlash('Data pengabdian ', 'berhasil dihapus', 'success');
            header('Location: ' . BASE_URL . '/dosen');
        } else {
            Flasher::setFlash('Data pengabdian ', 'gagal dihapus', 'danger');
            header('Location: ' . BASE_URL . '/dosen');
        }
    }
    // hapus data publikasi
    public function hapusPublikasi($id)
    {
        // hapus data dosen
        if ($this->model('Dosen_model')->deletePublikasi($id) > 0) {
            Flasher::setFlash('Data publikasi ', 'berhasil dihapus', 'success');
            header('Location: ' . BASE_URL . '/dosen');
        } else {
            Flasher::setFlash('Data publikasi ', 'gagal dihapus', 'danger');
            header('Location: ' . BASE_URL . '/dosen');
        }
    }
}
