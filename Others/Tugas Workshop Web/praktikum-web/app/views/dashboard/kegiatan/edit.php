<div class="container-fluid">
    <div class="row">
        <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Edit Kegiatan</h1>
            </div>
            <div class="col-md-6">
                <?php Flasher::flash() ?>
            </div>
            <div class="row">
                <div class="card mb-4">
                    <div class="card-body">
                        <form action="<?= BASE_URL ?>/kegiatan/update" method="post" enctype="multipart/form-data">
                            <input type="hidden" name="foto">
                            <input type="hidden" name="id" value="<?= $data['kegiatan']['id'] ?>">
                            <div class="mb-3">
                                <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                                <input type="text" name="nama_kegiatan" value="<?= $data['kegiatan']['nama_kegiatan'] ?>" class="form-control" id="nama_kegiatan">
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
                                <input type="date" value="<?= $data['kegiatan']['tanggal_pelaksanaan'] ?>" name="tanggal_pelaksanaan" class="form-control" id="tanggal_pelaksanaan">
                            </div>
                            <div class="mb-3">
                                <div class="form-floating">
                                    <label for="deskripsi">Desskripsi</label>
                                    <textarea class="form-control" name="deskripsi" value="<?= $data['kegiatan']['deskripsi'] ?>" id="deskripsi" style="height: 100px"></textarea>
                                </div>
                            </div>
                            <div class="mb-3">
                                <label for="foto" class="form-label">Foto Kegiatan</label>
                                <input type="file" value="<?= $data['kegiatan']['foto'] ?>" name="foto" class="form-control" id="foto">
                            </div>
                            <div class="mb-3">
                                <label for="lab" class="form-label">Lab</label>
                                <select class="form-select" name="id_lab">
                                    <?php foreach ($data['lab'] as $lab) : ?>
                                        <option <?= ($data['kegiatan']['id_lab'] == $lab['id']) ? 'selected' : '' ?> value="<?= $lab['id'] ?>"><?= $lab['nama_lab'] ?></option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                    </div>
                    <div class="card-footer">
                        <a href="<?= BASE_URL ?>/kegiatan" class="btn bg-light me-2">Kembali</a>
                        <button type="submit" class="btn btn-primary">Save Change</button>
                    </div>
                    </form>
                </div>
            </div>
        </main>
    </div>
</div>