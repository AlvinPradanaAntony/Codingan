<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Data Dosen</h1>
            </div>

            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#tambahDataDosen">
                Tambah Data Dosen
            </button>
            <div class="col-md-6 mt-4 mb-4">
                <?php Flasher::flash() ?>
            </div>

            <div class="table-responsive">
                <table class="table table-hover table-sm align-middle" id="table_kegiatan">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th>Foto</th>
                            <th scope="col">NIDN</th>
                            <th scope="col">Nama</th>
                            <th scope="col">No Telepon</th>
                            <th scope="col">Alamat</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data['dosen'] as $row) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><img width="100" height="100" src="<?= BASE_URL ?>/img/<?= $row['foto'] ?>" alt=""></td>
                                <td><?= $row['nidn'] ?></td>
                                <td><?= $row['nama'] ?></td>
                                <td><?= $row['no_telp'] ?></td>
                                <td><?= $row['alamat'] ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= BASE_URL; ?>/dosen/detail/<?= $row['id'] ?>" class="btn btn-primary btn-sm">Detail</a>
                                        <a href="<?= BASE_URL ?>/dosen/edit/<?= $row['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('apakah kamu yakin ?');" href="<?= BASE_URL ?>/dosen/hapus/<?= $row['id']; ?>">
                                            Hapus
                                        </a>
                                    </div>
                                </td>
                            </tr>
                            <?php $i++; ?>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </main>
    </div>

</div>

<!-- Modal -->
<div class="modal fade" id="tambahDataDosen" tabindex="-1" aria-labelledby="tambahDataDosenLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dosen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/dosen/store" method="POST" enctype="multipart/form-data">
                    <div class="mb-3">
                        <label for="nidn" class="form-label">NIDN</label>
                        <input type="text" class="form-control" id="nidn" name="nidn">
                    </div>
                    <div class="mb-3">
                        <label for="nama" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nama" name="nama">
                    </div>
                    <div class="mb-3">
                        <label for="no_telp" class="form-label">No Telepon</label>
                        <input type="text" class="form-control" id="no_telp" name="no_telp">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Alamat" id="alamat" name="alamat"></textarea>
                            <label for="alamat">Alamat</label>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input type="file" name="foto" class="form-control" placeholder="Enter dosen profile">
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Tambah Dosen</button>
                </form>
            </div>
        </div>
    </div>
</div>