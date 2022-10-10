<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">DETAIL VIDEO</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!-- detail tanya ke spesifik pertanyaannya -->
    <div class="card flex-fill w-100 pt-3">
        <div class="card-header mt-3">
            <h1 class="card-title mb-1 judul-video"><?= $detail_video['judul_video']; ?></h1>
            <a class="no-text-decoration" href="">
                <p class="mb-0">Penyuluh: <?= $data_user['nama']; ?></p>
            </a>
        </div>
        <div class="card-body py-3 pt-0 mt-4">
            <div class="row mb-4">
                <div class="col-6">
                    <b><label class="label-jawaban mb-2" for="link_video">Link video</label></b>
                    <a href="<?= $detail_video['link_video']; ?>">
                        <input type="text" class="link_video form-control btn btn-primary" name="link_video" id="link_video" value="<?= $detail_video['link_video']; ?>" disabled>
                    </a>
                </div>
            </div>
            <div class="mb-4">
                <b><label class="label-jawaban mb-2" for="caption_video">Caption Video</label></b>
                <br>
                <?= $detail_video['caption_video']; ?>
            </div>
            <div class="mb-4">
                <a href="<?= base_url("/video/edit/" . $detail_video['id_video']) ?>" class="btn btn-secondary">Edit</a>
                <a href="<?= base_url("/video/hapus/" . $detail_video['id_video']) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>