<?php
require ('koneksi.php');
require ('query.php');
$obj = new crud;


// echo "<pre>";
// print_r($_FILES['txt_img']);
// echo "</pre>";

// echo "<pre>";
// print_r($_POST['txt_namaKeg']);
// echo "</pre>";

// echo "<pre>";
// print_r($_POST['txt_desk']);
// echo "</pre>";
if (isset($_POST['update']) && isset($_FILES['txt_img'])) {
    $data = $_POST['txt_id'];
    $namaKeg = $_POST['txt_namaKeg'];
    $desk = $_POST['txt_desk'];
    $img_name = $_FILES['txt_img']['name'];
    $img_size = $_FILES['txt_img']['size'];
    $tmp_name = $_FILES['txt_img']['tmp_name'];
    $error = $_FILES['txt_img']['error'];

    if ($error === 0) {
        if ($img_size > 4096000) {
            header("Location: tables_kegiatan.php?error=gagal2");
        }else {
            $img_ex = pathinfo($img_name, PATHINFO_EXTENSION);
            $img_ex_lc = strtolower($img_ex);

            $allowed_exs = array("jpg", "jpeg", "png"); 

            if (in_array($img_ex_lc, $allowed_exs)) {
                $new_img_name = pathinfo($img_name, PATHINFO_BASENAME);
                $img_upload_path = '../img/'.$new_img_name;
                move_uploaded_file($tmp_name, $img_upload_path);

                // Insert into Database
                if(!$obj->detailDataKegiatan($data)) die ("Error: Id tidak ada");
                    if($obj->updateDataKegiatan($namaKeg, $desk, $new_img_name, $data)){
                        // echo ' <div class="alert alert-success">Data Berhasil disimpan</div>';
                        header("Location: tables_kegiatan.php?error=sukses");
                    } else {
                        // echo '<div class="alert alert-success">Data gagal disimpan</div>';
                        header("Location: tables_kegiatan.php?error=gagal1");
                    }
            } else {
                $em = "You can't upload files of this type";
                header("Location: tables_kegiatan.php?error=gagal3");
            }
        }

    }else {
        $em = "unknown error occurred!";
        header("Location: tables_kegiatan.php?error=gagal4");
    }
}else {
    echo 'gagal';
}
?>

