<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Kegiatan</h1>
            </div>
            <div class="col-md-6">
                <?php Flasher::flash() ?>
            </div>

            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#tambahDataKegiatan">
                Tambah Data Kegiatan
            </button>

            <div class="table-responsive">
                <table class="table table-hover table-sm align-middle" id="table_kegiatan">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Nama</th>
                            <th scope="col">Kategori</th>
                            <th scope="col">Tanggal</th>
                            <th scope="col">Deskripsi</th>
                            <th scope="col">Menu</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1; ?>
                        <?php foreach ($data['kegiatan'] as $kn) : ?>
                            <tr>
                                <td><?= $i ?></td>
                                <td><img width="100" height="100" src="<?= BASE_URL ?>/img/<?= $kn['foto'] ?>" alt=""></td>
                                <td><?= $kn['nama_kegiatan'] ?></td>
                                <td><?= $kn['kategori'] ?></td>
                                <td><?= $kn['tanggal_pelaksanaan'] ?></td>
                                <td style="width: 300px;"><?= substr($kn['deskripsi'], 0, 40) . '...' ?></td>
                                <td>
                                    <div class="btn-group" role="group">
                                        <a href="<?= BASE_URL; ?>/kegiatan/detail/<?= $kn['id'] ?>" class="btn btn-primary btn-sm">Detail</a>
                                        <a href="<?= BASE_URL ?>/kegiatan/edit/<?= $kn['id']; ?>" class="btn btn-warning btn-sm">Edit</a>
                                        <a class="btn btn-danger btn-sm" onclick="return confirm('apakah kamu yakin ?');" href="<?= BASE_URL ?>/kegiatan/hapus/<?= $kn['id']; ?>">
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
<div class="modal fade" id="tambahDataKegiatan" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Kegiatan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="<?= BASE_URL ?>/kegiatan/tambah" method="post" enctype="multipart/form-data">
                    <input type="hidden" name="foto">
                    <div class="mb-3">
                        <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control" id="nama_kegiatan">
                    </div>
                    <div class="mb-3">
                        <label for="kategori" class="form-label">Kategori</label>
                        <select class="form-select" name="kategori">
                            <option value="Design">Design</option>
                            <option value="Coding">Coding</option>
                            <option value="Algorithm">Algorithm</option>
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="tanggal_pelaksanaan" class="form-label">Tanggal</label>
                        <input type="date" name="tanggal_pelaksanaan" class="form-control" id="tanggal_pelaksanaan">
                    </div>
                    <div class="mb-3">
                        <div class="form-floating">
                            <textarea class="form-control" name="deskripsi" placeholder="Tulis deskripsi kegiatan" id="deskripsi" style="height: 100px"></textarea>
                            <label for="deskripsi">Deskripsi</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="foto" class="form-label">Foto Kegiatan</label>
                        <input type="file" name="foto" class="form-control" id="foto">
                    </div>
                    <div class="mb-3">
                        <label for="lab" class="form-label">Lab</label>
                        <select class="form-select" name="id_lab">
                            <?php foreach ($data['lab'] as $lab) : ?>
                                <option value="<?= $lab['id'] ?>"><?= $lab['nama_lab'] ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
            </form>
        </div>
    </div>
</div>