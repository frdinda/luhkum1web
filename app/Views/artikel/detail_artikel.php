<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">DETAIL ARTIKEL</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!-- detail tanya ke spesifik pertanyaannya -->
    <div class="card flex-fill w-100 pt-3">
        <div class="card-header mt-3">
            <h1 class="card-title mb-1 judul-artikel"><?= $detail_artikel['judul_artikel']; ?></h1>
            <a class="no-text-decoration" href="">
                <p class="mb-0">Penyuluh: <?= $data_user['nama']; ?></p>
            </a>
        </div>
        <div class="card-body py-3 pt-0 mt-3">
            <?= $detail_artikel['isi_artikel']; ?>
        </div>
        <?php if ($email == $email_penulis || $id_akses == 'super') { ?>
            <div class="card-body py-3 pt-0 mt-3">
                <?php
                $arr1 = explode('-', $detail_artikel['tanggal_artikel']);
                $arr2 = implode('', $arr1);
                $code = $arr2 . '-' . $detail_artikel['id_artikel'];
                ?>
                <div class="row">
                    <div class="col-1">
                        <a href="<?= base_url("/artikel/edit/" . $code) ?>" class="btn btn-secondary">Edit</a>
                    </div>
                    <div class="col-1">
                        <a href="<?= base_url("/artikel/hapus/" . $code) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>
<?= $this->endSection(); ?>