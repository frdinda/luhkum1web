<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">TAMBAH VIDEO</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!-- detail tanya ke spesifik pertanyaannya -->
    <div class="card flex-fill w-100 pt-3">
        <div class="card-body py-3 pt-0">
            <form class="buat-video mt-3" id="buat-video" action="<?= base_url('/video/save_video'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" class="email form-control" name="email" id="email" value="<?= $email; ?>" required>
                <div class="mb-4">
                    <label class="label-jawaban mb-2" for="judul_video">Judul Video<span class="bintang-label-jawaban">*</span></label>
                    <!-- nanti diganti sama rich text -->
                    <input type="text" class="judul_video form-control" name="judul_video" id="judul_video" placeholder="" required>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label class="label-jawaban mb-2" for="link_video">Link Video (Youtube)<span class="bintang-label-jawaban">*</span></label>
                        <!-- nanti diganti sama rich text -->
                        <input type="text" class="link_video form-control" name="link_video" id="link_video" placeholder="" required>
                    </div>
                    <div class="col-6">
                        <label class="label-jawaban mb-2" for="tanggal_video">Tanggal Video<span class="bintang-label-jawaban">*</span></label>
                        <input type="datetime-local" class="tanggal_video form-control" name="tanggal_video" id="tanggal_video" placeholder="" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="label-jawaban mb-2" for="caption_video">Caption Video<span class="bintang-label-jawaban">*</span></label>
                    <!-- nanti diganti sama rich text -->
                    <textarea class="caption_video form-control" name="caption_video" id="caption_video" placeholder="" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>