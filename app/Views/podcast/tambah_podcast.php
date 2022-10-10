<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">TAMBAH PODCAST</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!-- detail tanya ke spesifik pertanyaannya -->
    <div class="card flex-fill w-100 pt-3">
        <div class="card-body py-3 pt-0">
            <form class="buat-podcast mt-3" id="buat-podcast" action="<?= base_url('/podcast/save_podcast'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" class="email form-control" name="email" id="email" value="<?= $email; ?>" required>
                <div class="mb-4">
                    <label class="label-jawaban mb-2" for="judul_podcast">Judul Podcast<span class="bintang-label-jawaban">*</span></label>
                    <!-- nanti diganti sama rich text -->
                    <input type="text" class="judul_podcast form-control" name="judul_podcast" id="judul_podcast" placeholder="" required>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label class="label-jawaban mb-2" for="link_podcast">Link Podcast (Youtube)<span class="bintang-label-jawaban">*</span></label>
                        <!-- nanti diganti sama rich text -->
                        <input type="text" class="link_podcast form-control" name="link_podcast" id="link_podcast" placeholder="" required>
                    </div>
                    <div class="col-6">
                        <label class="label-jawaban mb-2" for="tanggal_podcast">Tanggal Podcast<span class="bintang-label-jawaban">*</span></label>
                        <input type="datetime-local" class="tanggal_podcast form-control" name="tanggal_podcast" id="tanggal_podcast" placeholder="" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="label-jawaban mb-2" for="caption_podcast">Caption Podcast<span class="bintang-label-jawaban">*</span></label>
                    <!-- nanti diganti sama rich text -->
                    <textarea class="caption_podcast form-control" name="caption_podcast" id="caption_podcast" placeholder="" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>