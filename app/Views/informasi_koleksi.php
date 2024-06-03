<?= $this->extend('kerangka') ?>

<?= $this->section('isi_web') ?>
    <div class="row">
        <div class="col-md-12">
            <span style="float: left;" class="fs-3 fw-bold">Koleksi Buku</span>
            <button type="button" class="btn btn-primary mb-3" data-bs-toggle="modal" data-bs-target="#ModalTambah" style="float: right;">
                Tambah
            </button>
            <table class="table table-responsive" >
                <thead>
                    <tr>
                        <th scope="col" class="text-center">ISBN</th>
                        <th scope="col" class="text-center">Sampul</th>
                        <th scope="col" class="text-center">Judul Buku</th>
                        <th scope="col" class="text-center">Penulis</th>
                        <th scope="col" class="text-center">Penerbit</th>
                        <th scope="col" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($isi_db as $dt) { ?>
                        <tr>
                            <td class="text-center"><?= $dt->isbn; ?></td>
                            <td style="width: 15%;"><img src="<?= base_url(); ?>/sampul/<?= $dt->sampul; ?>" alt="" class="img-fluid"></td>
                            <td class="text-center"><?= $dt->judul_buku; ?></td>
                            <td class="text-center"><?= $dt->penulis; ?></td>
                            <td class="text-center"><?= $dt->penerbit; ?></td>
                            <td class="text-center">
                                <!-- Button trigger update -->
                                <button type="button" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#ModalUbah<?= $dt->isbn; ?>">
                                    Ubah
                                </button>

                                <!-- Button trigger delete -->
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#ModalHapus<?= $dt->isbn; ?>">
                                    Hapus
                                </button>
                            </td>
                        </tr>
                    <?php }; ?>
                </tbody>
            </table>
        </div>
    </div>
    <br>
    <?= $pager->links('isi_db', 'buku_pagination'); ?>

<!-- Modal Tambah -->
<div class="modal fade" id="ModalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5 fw-bold" id="exampleModalLabel">Form Tambah Data </h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="<?= base_url('tambah_data') ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>

                <div class="modal-body">
                    <div class="mb-3">
                        <label for="fm_judul" class="form-label">Judul Buku</label>
                        <input type="text" class="form-control" id="fm_judul" name="fm_judul" placeholder="......." required>
                    </div>
                    <div class="mb-3">
                        <label for="fm_penulis" class="form-label">Penulis</label>
                        <input type="text" class="form-control" id="fm_penulis" name="fm_penulis" placeholder="......." required>
                    </div>
                    <div class="mb-3">
                        <label class="form-label d-block">Penerbit</label>

                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fm_penerbit" id="lokal" value="lokal" checked>
                            <label class="form-check-label" for="lokal">Lokal</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fm_penerbit" id="nasional" value="nasional">
                            <label class="form-check-label" for="nasional">Nasional</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="fm_penerbit" id="internasional" value="internasional">
                            <label class="form-check-label" for="internasional">Internasional</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="fm_sampul" class="form-label">Sampul Buku</label>
                        <input type="file" class="form-control" id="fm_sampul" name="fm_sampul" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Aksi Tambah</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Hapus -->
<?php foreach ($isi_db as $dl) { ?>
    <div class="modal fade" id="ModalHapus<?= $dl->isbn ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Pernyataan Hapus</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('hapus') ?>" method="post">
                    <div class="modal-body">
                        Apakah Anda Yakin Akan Menghapus Data Dengan ID-<?= $dl->isbn ?>
                    </div>
                    <div class="modal-footer">
                        <input type="hidden" name="fm_id_sembunyi" value="<?= $dl->isbn ?>">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-danger">Hapus</button>
                    </div>
                </form>

            </div>
        </div>
    </div>
<?php }; ?>

<!-- Modal Ubah -->
<?php foreach ($isi_db as $du) { ?>
    <div class="modal fade" id="ModalUbah<?= $du->isbn ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h1 class="modal-title fs-5" id="exampleModalLabel">Update Data</h1>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="<?= base_url('ubah') ?>" method="post" enctype="multipart/form-data">
                    <?= csrf_field(); ?>

                    <div class="modal-body">
                        <input type="hidden" name="fm_isbn" value="<?= $du->isbn ?>">
                        <input type="hidden" name="fm_sampul_lama" value="<?= $du->sampul; ?>">

                        <div class="mb-3">
                            <label for="fm_judul" class="form-label">Judul Buku</label>
                            <input type="text" class="form-control" id="fm_judul" name="fm_judul" placeholder="......." value="<?= $du->judul_buku; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="fm_penulis" class="form-label">Penulis</label>
                            <input type="text" class="form-control" id="fm_penulis" name="fm_penulis" placeholder="......." value="<?= $du->penulis; ?>" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label d-block">Penerbit</label>

                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fm_penerbit" id="lokal" value="lokal" <?php if ($du->penerbit == 'lokal') echo "checked"; ?>>
                                <label class="form-check-label" for="lokal">Lokal</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fm_penerbit" id="nasional" value="nasional" <?php if ($du->penerbit == 'nasional') echo "checked"; ?>>
                                <label class="form-check-label" for="nasional">Nasional</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="fm_penerbit" id="internasional" <?php if ($du->penerbit == 'internasional') echo "checked"; ?>>
                                <label class="form-check-label" for="internasional">Internasional</label>
                            </div>
                        </div>
                        <div class="mb-3">
                            <label for="fm_sampul" class="form-label">Sampul Buku</label>
                            <input type="file" class="form-control" id="fm_sampul" name="fm_sampul" >
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Ubah</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php }; ?>
<?= $this->endSection() ?>