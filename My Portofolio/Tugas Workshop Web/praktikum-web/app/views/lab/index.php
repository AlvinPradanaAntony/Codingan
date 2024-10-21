<div class="container mb-5">
    <!-- main -->
    <main>
        <section class="py-5 text-center container">
            <div class="row py-lg-5">
                <div class="col-lg-6 col-md-8 mx-auto">
                    <h1 class="fw-light"><?= $data['singleLab']['nama_lab'] ?></h1>
                </div>
            </div>
        </section>

        <h3 class="mb-4">Deskripsi</h3>
        <p class="lead text-muted mb-4">
            Laboratorium Rekayasa Perangkat Lunak yang kemudian lebih populer disebut sebagai Lab RPL resmi beroperasi sejak 12/ 04/ 2002. Lab RPL pernah digunakan untuk pelatihan ABC, DEF dan GHI yang merupakan kerjasama Fakultas/ Prodi X Universitas Muhammadiyah Jember dan Industri seperti (Oracle Academy Indonesia) atau yang lain, pelatihan tersebut diikuti (Sejumlah) peserta yang terdiri dari dosen-dosen beberapa perguruan tinggi di wilayah Jawa Timur.

            Laboratorium ini digunakan untuk kegiatan praktikum Mahasiswa Fakultas Teknik baik dari program studi Manajemen Informatika (D3), dan Teknik Informatika (D4). Secara khusus Lab RPL diperuntukan untuk menunjang kegiatan di bidang pemrograman dan perancangan perangkat lunak. Kapasitas Lab RPL sebanyak () komputer untuk mahasiswa dan 1 komputer untuk dosen.
        </p>

        <h3 class="mb-4 mt-4">Kegiatan</h3>
        <div class="row mt-4">
            <?php if (sizeof($data['kegiatan']) == 0) : ?>
                <div class="alert alert-secondary" role="alert">
                    <h3>Tidak ada kegiatan!</h3>
                </div>
            <?php else : ?>
                <?php foreach ($data['kegiatan'] as $kegiatan) : ?>
                    <div class="col-md-6">
                        <div class="row g-0 border rounded overflow-hidden flex-md-row mb-4 shadow-sm h-md-250 position-relative">
                            <div class="col p-4 d-flex flex-column position-static">
                                <strong class="d-inline-block mb-2 text-primary"><?= $kegiatan['kategori'] ?></strong>
                                <h3 class="mb-0"><?= $kegiatan['nama_kegiatan'] ?></h3>
                                <div class="mb-1 text-muted"><?= $kegiatan['tanggal_pelaksanaan'] ?></div>
                                <p class="card-text mb-auto"><?= substr($kegiatan['deskripsi'], 0, 40) . '...' ?></p>
                                <a href="#" class="stretched-link">Selengkapnya</a>
                            </div>
                            <div class="col-auto d-none d-lg-block">
                                <img class="bd-placeholder-img" src="<?= BASE_URL ?>/img/<?= $kegiatan['foto'] ?>" width="200" height="250" />
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </main>
</div>