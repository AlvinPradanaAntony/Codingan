-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Nov 2021 pada 15.44
-- Versi server: 10.4.18-MariaDB
-- Versi PHP: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `praktikum-web`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `dosen`
--

CREATE TABLE `dosen` (
  `id` int(11) NOT NULL,
  `nidn` varchar(10) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_telp` varchar(12) NOT NULL,
  `alamat` text NOT NULL,
  `foto` varchar(4) NOT NULL,
  `id_publikasi` varchar(4) NOT NULL,
  `id_pengabdian` varchar(4) NOT NULL,
  `id_pendidikan` varchar(4) NOT NULL,
  `jafung` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `kegiatan`
--

CREATE TABLE `kegiatan` (
  `id` int(11) NOT NULL,
  `nama_kegiatan` varchar(30) NOT NULL,
  `kategori` enum('Design','Coding','Soft Skill') NOT NULL,
  `tanggal_pelaksanaan` varchar(12) NOT NULL,
  `deskripsi` text NOT NULL,
  `foto` varchar(255) NOT NULL,
  `id_lab` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kegiatan`
--

INSERT INTO `kegiatan` (`id`, `nama_kegiatan`, `kategori`, `tanggal_pelaksanaan`, `deskripsi`, `foto`, `id_lab`) VALUES
(5, 'Design War', 'Design', '2021-11-07', 'From mid-century modernism to the swinging sixties through to the edgy, subversive seventies, British design post-1945 became an antidote to the sombre ethos of wartime, as designers found creative solutions to transform a nation still dealing with austerity and rationing.', '61871c4ceffd561871c4ceffd5.webp', 2),
(6, 'Design Jam 2021', 'Design', '2021-11-07', 'A few months ago, I was faced with choosing a topic for my final project. Our lecturers have provided several topics that we can take as a final project. But I think I want to do something more so that this is not just a final project for me to graduate. I want to experiment and try things I’ve never done before. As a digital product designer, I’m more used to making designs for platforms like the web and mobile. But I want to try something new. Then I put forward a topic that is very unique to me, I put forward the topic of Augmented Reality.', '61871cd7bc27461871cd7bc274.png', 2),
(7, 'Programming Copilot', 'Coding', '2021-11-07', 'WAICY (World Artificial Competition for Youth) adalah kompetisi AI global yang mendorong anak-anak untuk menggunakan pengetahuan AI mereka untuk membangun proyek yang memecahkan masalah dunia nyata seperti perubahan iklim, hak asasi manusia, perawatan kesehatan masyarakat global, dll.\r\n\r\nWAICY pertama kali diadakan di 2018 di lokasi Carnegie Mellon University USA (https://www.waicy.org/) dan setiap tahun banyak siswa dari berbagai negara mengikuti kompetisi ini. Kompetisi ini terbuka untuk semua siswa di seluruh dunia dan berlangsung baik secara virtual maupun tatap muka.', '61871d26d718b61871d26d718b.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `lab`
--

CREATE TABLE `lab` (
  `id` int(11) NOT NULL,
  `nama_lab` varchar(40) NOT NULL,
  `deskripsi` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lab`
--

INSERT INTO `lab` (`id`, `nama_lab`, `deskripsi`) VALUES
(1, 'Multimedia', 'Multimedia adalah penggunaan komputer untuk menyajikan dan menggabungkan teks, suara, gambar, animasi, audio, dan video dengan alat bantu dan tautan sehingga pengguna dapat melakukan navigasi, berinteraksi, berkarya, dan berkomunikasi.'),
(2, 'Rekayasa Perangkat Lunak', 'RPL adalah sebuah jurusan yang mempelajari dan mendalami semua cara-cara pengembangan perangkat lunak termasuk pembuatan, pemeliharaan, manajemen organisasi pengembangan perangkat lunak dan manajemen kualitas'),
(3, 'Pemrograman', 'Pemrograman adalah proses menulis, menguji dan memperbaiki, dan memelihara kode yang membangun suatu program komputer. Kode ini ditulis dalam berbagai bahasa pemrograman'),
(4, 'Pengolahan Citra Digital', 'Citra digital dapat didefinisikan sebagai fungsi dua variabel, f(x,y), dimana x dan y adalah koordinat spasial dan nilai f(x,y) yang merupakan intensitas citra pada koordinat tersebut.'),
(5, 'Jaringan', 'Jaringan adalah kelompok sel-sel yang mempunyai fungsi dan bentuk sama. Setiap sel suatu organisme memiliki ukuran yang bervariasi, dan ukuran sel mencerminkan fungsi yang dilakukan sel tersebut. Jaringan meristematik terdiri dari sel-sel meristem.');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lab_role`
--

CREATE TABLE `lab_role` (
  `id` int(11) NOT NULL,
  `role` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lab_role`
--

INSERT INTO `lab_role` (`id`, `role`) VALUES
(1, 'ketua kelompok riset'),
(2, 'anggota');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mata_kuliah`
--

CREATE TABLE `mata_kuliah` (
  `id` int(11) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `id_lab` int(2) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `mata_kuliah`
--

INSERT INTO `mata_kuliah` (`id`, `nama`, `id_lab`) VALUES
(1, 'Basis Data', 2),
(2, 'Struktur Data', 2),
(3, 'Pemrograman Dasar', 2),
(4, 'Pemrograman Berorientasi Objek', 2),
(5, 'Pemrograman Web', 2);

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `id` varchar(4) NOT NULL,
  `nama_pt` varchar(40) NOT NULL,
  `prodi` varchar(50) NOT NULL,
  `tahun_lulus` int(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengabdian`
--

CREATE TABLE `pengabdian` (
  `id` varchar(4) NOT NULL,
  `tahun` int(4) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `dana` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `publikasi`
--

CREATE TABLE `publikasi` (
  `id` varchar(4) NOT NULL,
  `tahun` int(4) NOT NULL,
  `judul` varchar(50) NOT NULL,
  `dana` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(255) NOT NULL,
  `role_id` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `role_id`) VALUES
(7, 'E41200036', '$2y$10$nEWIFeipJ.vE9bYc.nw2A.OD1iZUwEZQLXbgelzbEmKl0PgnLibWy', 2),
(8, 'admin', '$2y$10$Je/MF9384Ir5.YLVmH.q2.HlXUbLjd3dOUM2BM80w.gYtsr58RhLK', 1);

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nidn` (`nidn`),
  ADD KEY `Dosen_fk0` (`id_publikasi`),
  ADD KEY `Dosen_fk1` (`id_pengabdian`),
  ADD KEY `Dosen_fk2` (`id_pendidikan`);

--
-- Indeks untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lab`
--
ALTER TABLE `lab`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lab_role`
--
ALTER TABLE `lab_role`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pengabdian`
--
ALTER TABLE `pengabdian`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `publikasi`
--
ALTER TABLE `publikasi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `dosen`
--
ALTER TABLE `dosen`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `kegiatan`
--
ALTER TABLE `kegiatan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `lab`
--
ALTER TABLE `lab`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `lab_role`
--
ALTER TABLE `lab_role`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `mata_kuliah`
--
ALTER TABLE `mata_kuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dosen`
--
ALTER TABLE `dosen`
  ADD CONSTRAINT `Dosen_fk0` FOREIGN KEY (`id_publikasi`) REFERENCES `publikasi` (`id`),
  ADD CONSTRAINT `Dosen_fk1` FOREIGN KEY (`id_pengabdian`) REFERENCES `pengabdian` (`id`),
  ADD CONSTRAINT `Dosen_fk2` FOREIGN KEY (`id_pendidikan`) REFERENCES `pendidikan` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
