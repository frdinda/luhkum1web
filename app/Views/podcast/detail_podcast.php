<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">DETAIL PODCAST</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!-- detail tanya ke spesifik pertanyaannya -->
    <div class="card flex-fill w-100 pt-3">
        <div class="card-header mt-3">
            <h1 class="card-title mb-1 judul-podcast"><?= $detail_podcast['judul_podcast']; ?></h1>
            <a class="no-text-decoration" href="">
                <p class="mb-0">Penyuluh: <?= $data_user['nama']; ?></p>
            </a>
        </div>
        <div class="card-body py-3 pt-0 mt-4">
            <div class="row mb-4">
                <div class="col-6">
                    <b><label class="label-jawaban mb-2" for="link_podcast">Link Podcast</label></b>
                    <a href="<?= $detail_podcast['link_podcast']; ?>">
                        <input type="text" class="link_podcast form-control btn btn-primary" name="link_podcast" id="link_podcast" value="<?= $detail_podcast['link_podcast']; ?>" disabled>
                    </a>
                </div>
                <div class="col-6">
                    <b><label class="label-jawaban mb-2" for="tanggal_podcast">Tanggal Podcast</label></b>
                    <input type="text" class="tanggal_podcast form-control" name="tanggal_podcast" id="tanggal_podcast" value="<?= $detail_podcast['tanggal_podcast']; ?>" disabled>
                </div>
            </div>
            <div class="mb-4">
                <b><label class="label-jawaban mb-2" for="caption_podcast">Caption Podcast</label></b>
                <?= $detail_podcast['caption_podcast']; ?>
            </div>
            <div class="mb-4">
                <a href="<?= base_url("/podcast/edit/" . $detail_podcast['id_podcast']) ?>" class="btn btn-secondary">Edit</a>
                <a href="<?= base_url("/podcast/hapus/" . $detail_podcast['id_podcast']) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>