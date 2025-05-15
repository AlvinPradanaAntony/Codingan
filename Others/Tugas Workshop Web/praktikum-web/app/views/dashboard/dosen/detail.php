<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <?php Flasher::flash() ?>
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2"><?= $data['title'] ?></h1>
            </div>

            <div class="row">
                <div class="col-lg-3">
                    <div class="card mb-4">
                        <img src="<?= BASE_URL ?>/../public/img/<?= $data['dosen']['foto'] ?>" class="card-img-top" alt="...">
                    </div>
                    <a href="<?= BASE_URL ?>/dosen" class="btn btn-light">
                        <span data-feather="arrow-left-circle"></span> Kembali </a>
                </div>
                <div class="col-lg-8">
                    <nav>
                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                            <button class="nav-link active" id="nav-biodata-tab" data-bs-toggle="tab" data-bs-target="#nav-biodata" type="button" role="tab" aria-controls="nav-biodata" aria-selected="true">Biodata</button>
                            <button class="nav-link" id="nav-publikasi-tab" data-bs-toggle="tab" data-bs-target="#nav-publikasi" type="button" role="tab" aria-controls="nav-publikasi" aria-selected="false">Publikasi</button>
                            <button class="nav-link" id="nav-pengabdian-tab" data-bs-toggle="tab" data-bs-target="#nav-pengabdian" type="button" role="tab" aria-controls="nav-pengabdian" aria-selected="false">Pengabdian</button>
                            <button class="nav-link" id="nav-pendidikan-tab" data-bs-toggle="tab" data-bs-target="#nav-pendidikan" type="button" role="tab" aria-controls="nav-pendidikan" aria-selected="false">Pendidikan</button>
                        </div>
                    </nav>
                    <div class="tab-content" id="nav-tabContent">
                        <div class="tab-pane fade show active" id="nav-biodata" role="tabpanel" aria-labelledby="nav-biodata-tab">
                            <div class="mt-4">
                                <p>Nama: <?= $data['dosen']['nama'] ?></p>
                                <p>NIDN: <?= $data['dosen']['nidn'] ?></p>
                                <p>No Telepon: <?= $data['dosen']['no_telp'] ?></p>
                                <p>Alamat: <?= $data['dosen']['alamat'] ?></p>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-publikasi" role="tabpanel" aria-labelledby="nav-publikasi-tab">
                            <div class="mt-4">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPublikasi">
                                    Tambah Data Publikasi
                                </button>
                                <!-- all publication data -->
                                <div class="table-responsive mt-4">
                                    <table class="table table-hover table-sm align-middle" id="table_publikasi">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tahun</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Dana</th>
                                                <th scope="col">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($data['publikasi'] as $kn) : ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $kn['tahun'] ?></td>
                                                    <td><?= $kn['judul'] ?></td>
                                                    <td><?= $kn['dana'] ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <!-- <a href="<?= BASE_URL ?>/publikasi/edit/<?= $kn['id']; ?>" class="btn btn-warning btn-sm">Edit</a> -->
                                                            <a class="btn btn-danger btn-sm" onclick="return confirm('apakah kamu yakin ?');" href="<?= BASE_URL ?>/dosen/hapusPublikasi/<?= $kn['id']; ?>">
                                                                <span data-feather="x-square"></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-pengabdian" role="tabpanel" aria-labelledby="nav-pengabdian-tab">
                            <div class="mt-4">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPengabdian">
                                    Tambah Data Pengabdian
                                </button>
                                <!-- all publication data -->
                                <div class="table-responsive mt-4">
                                    <table class="table table-hover table-sm align-middle" id="table_pengabdian">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Tahun</th>
                                                <th scope="col">Judul</th>
                                                <th scope="col">Dana</th>
                                                <th scope="col">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($data['pengabdian'] as $kn) : ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $kn['tahun'] ?></td>
                                                    <td><?= $kn['judul'] ?></td>
                                                    <td><?= $kn['dana'] ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <!-- <a href="<?= BASE_URL ?>/publikasi/edit/<?= $kn['id']; ?>" class="btn btn-warning btn-sm">Edit</a> -->
                                                            <a class="btn btn-danger btn-sm" onclick="return confirm('apakah kamu yakin ?');" href="<?= BASE_URL ?>/dosen/hapusPengabdian/<?= $kn['id']; ?>">
                                                                <span data-feather="x-square"></span>
                                                            </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="nav-pendidikan" role="tabpanel" aria-labelledby="nav-pendidikan-tab">
                            <div class="mt-4">
                                <button type="button" class="btn btn-primary btn-sm" data-bs-toggle="modal" data-bs-target="#modalPendidikan">
                                    Tambah Data Pendidikan
                                </button>
                                <div class="table-responsive mt-4">
                                    <table class="table table-hover table-sm align-middle" id="table_pendidikan">
                                        <thead>
                                            <tr>
                                                <th scope="col">#</th>
                                                <th scope="col">Nama PT</th>
                                                <th scope="col">Prodi</th>
                                                <th scope="col">Tahun Lulus</th>
                                                <th scope="col">Menu</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php $i = 1; ?>
                                            <?php foreach ($data['pendidikan'] as $kn) : ?>
                                                <tr>
                                                    <td><?= $i ?></td>
                                                    <td><?= $kn['nama_pt'] ?></td>
                                                    <td><?= $kn['prodi'] ?></td>
                                                    <td><?= $kn['tahun_lulus'] ?></td>
                                                    <td>
                                                        <div class="btn-group" role="group">
                                                            <!-- <a href="<?= BASE_URL ?>/publikasi/edit/<?= $kn['id']; ?>" class="btn btn-warning btn-sm">Edit</a> -->
                                                            <a class="btn btn-danger btn-sm" onclick="return confirm('apakah kamu yakin ?');" href="<?= BASE_URL ?>/dosen/hapusPendidikan/<?= $kn['id']; ?>">
                                                                <span data-feather="x-square"></span> </a>
                                                        </div>
                                                    </td>
                                                </tr>
                                                <?php $i++; ?>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>

<!-- publication modal -->
<div class="modal fade" id="modalPublikasi" tabindex="-1" aria-labelledby="modalPublikasiLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPublikasiLabel">Tambah Data Publikasi</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASE_URL ?>/dosen/publikasi">
                    <input type="hidden" name="dosen_id" value="<?= $data['dosen']['id'] ?>">
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <select class="form-select" name="tahun">
                            <?php for ($i = 1990; $i <= date("Y"); $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="dana" class="form-label">Dana</label>
                        <input type="text" class="form-control" id="dana" name="dana">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data Publikasi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- pengabdian modal -->
<div class="modal fade" id="modalPengabdian" tabindex="-1" aria-labelledby="modalPengabdianLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPengabdianLabel">Tambah Data Pengabdian</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASE_URL ?>/dosen/pengabdian">
                    <input type="hidden" name="dosen_id" value="<?= $data['dosen']['id'] ?>">
                    <div class="mb-3">
                        <label for="tahun" class="form-label">Tahun</label>
                        <select class="form-select" name="tahun">
                            <?php for ($i = 1990; $i <= date("Y"); $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="judul" class="form-label">Judul</label>
                        <input type="text" class="form-control" id="judul" name="judul">
                    </div>
                    <div class="mb-3">
                        <label for="dana" class="form-label">Dana</label>
                        <input type="text" class="form-control" id="dana" name="dana">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data Publikasi</button>
                </form>
            </div>
        </div>
    </div>
</div>

<!-- pendidikan modal -->
<div class="modal fade" id="modalPendidikan" tabindex="-1" aria-labelledby="modalPendidikanLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalPendidikanLabel">Tambah Data Pendidikan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="POST" action="<?= BASE_URL ?>/dosen/pendidikan">
                    <input type="hidden" name="dosen_id" value="<?= $data['dosen']['id'] ?>">
                    <div class="mb-3">
                        <label for="nama_pt" class="form-label">Nama PT</label>
                        <input type="text" class="form-control" id="nama_pt" name="nama_pt">
                    </div>
                    <div class="mb-3">
                        <label for="prodi" class="form-label">Prodi</label>
                        <input type="text" class="form-control" id="prodi" name="prodi">
                    </div>
                    <div class="mb-3">
                        <label for="tahun_lulus" class="form-label">Tahun Lulus</label>
                        <select class="form-select" name="tahun_lulus">
                            <?php for ($i = 1990; $i <= date("Y"); $i++) : ?>
                                <option value="<?= $i ?>"><?= $i ?></option>
                            <?php endfor; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Data Pendidikan</button>
                </form>
            </div>
        </div>
    </div>
</div>