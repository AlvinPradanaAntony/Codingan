<!-- main -->
<main>
    <section class="py-5 text-center container">
        <div class="row justify-content-center">
            <div class="col-lg-6">
                <?php Flasher::flash() ?>
            </div>
        </div>
        <div class="row py-lg-5">
            <div class="col-lg-6 col-md-8 mx-auto">
                <h1 class="fw-light">Selamat Datang</h1>
                <p class="lead text-muted my-4">Politeknik Negeri Jember merupakan perguruan tinggi yang menyelenggarakan pendidikan vokasional, yaitu program pendidikan yang mengarah proses belajar mengajar pada tingkat keahlian dan standar kompetensi yang spesifik</p>
            </div>
        </div>
    </section>
    <!-- kegiatan -->
    <section class="container">
        <div class="row">
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
        </div>
    </section>
</main>