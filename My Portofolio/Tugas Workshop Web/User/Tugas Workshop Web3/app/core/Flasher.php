<?php

class Flasher
{
    public static function setFlash($pesan, $aksi, $tipe)
    {
        $_SESSION['flash'] = [
            'pesan' => $pesan,
            'aksi' => $aksi,
            'tipe' => $tipe
        ];
    }

    public static function flash()
    {
        if (isset($_SESSION['flash'])) {
            echo '
                <div class="alert alert-' . $_SESSION['flash']['tipe'] . '" role="alert">
                    ' . $_SESSION['flash']['pesan'] . $_SESSION['flash']['aksi'] . '
                </div>
                ';
            unset($_SESSION['flash']);
        }
    }
}
