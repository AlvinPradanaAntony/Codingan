<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Detail Kegiatan</h1>
            </div>
            <div class="mt-5 mb-3" style="max-width: 720px;">
                <div class="row g-0 align-items-center">
                    <div class="col-md-4">
                        <img src="<?= BASE_URL ?>/../public/img/<?= $data['kegiatan']['foto'] ?>" class="img-fluid rounded-start" />
                    </div>
                    <div class="col-md-8">
                        <div class="card-body">
                            <h5 class="card-title"><?= $data['kegiatan']['nama_kegiatan'] ?></h5>
                            <p class="card-text"><?= $data['kegiatan']['deskripsi'] ?></p>
                            <p class="card-text"><small class="text-muted"><?= $data['lab']['nama_lab'] ?></small> | <small class="text-muted"><?= $data['kegiatan']['kategori'] ?></small> | <small class="text-muted"><?= $data['kegiatan']['tanggal_pelaksanaan'] ?></small></p>
                            <a href="<?= BASE_URL ?>/kegiatan" class="btn btn-sm btn-primary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>