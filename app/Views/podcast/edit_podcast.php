<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">DETAIL PODCAST</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!-- detail tanya ke spesifik pertanyaannya -->
    <div class="card flex-fill w-100 pt-3">
        <div class="card-body py-3 pt-0 mt-4">
            <form class="buat-podcast mt-3" id="buat-podcast" action="<?= base_url('/podcast/save_edit_podcast'); ?>" method="post" enctype="multipart/form-data">
                <?= csrf_field(); ?>
                <input type="hidden" class="email form-control" name="email" id="email" value="<?= $detail_podcast['email']; ?>" required>
                <input type="hidden" class="id_podcast form-control" name="id_podcast" id="id_podcast" value="<?= $detail_podcast['id_podcast']; ?>" required>
                <div class="mb-4">
                    <label class="label-jawaban mb-2" for="judul_podcast">Judul Podcast<span class="bintang-label-jawaban">*</span></label>
                    <!-- nanti diganti sama rich text -->
                    <input type="text" class="judul_podcast form-control" name="judul_podcast" id="judul_podcast" value="<?= $detail_podcast['judul_podcast']; ?>" required>
                </div>
                <div class="row mb-4">
                    <div class="col-6">
                        <label class="label-jawaban mb-2" for="link_podcast">Link Podcast (Youtube)<span class="bintang-label-jawaban">*</span></label>
                        <a href="<?= $detail_podcast['link_podcast']; ?>">
                            <input type="text" class="link_podcast form-control" name="link_podcast" id="link_podcast" value="<?= $detail_podcast['link_podcast']; ?>" required>
                        </a>
                    </div>
                    <div class="col-6">
                        <label class="label-jawaban mb-2" for="tanggal_podcast">Tanggal Podcast<span class="bintang-label-jawaban">*</span></label>
                        <input type="datetime-local" class="tanggal_podcast form-control" name="tanggal_podcast" id="tanggal_podcast" value="<?= $detail_podcast['tanggal_podcast']; ?>" required>
                    </div>
                </div>
                <div class="mb-4">
                    <label class="label-jawaban mb-2" for="caption_podcast">Caption Podcast<span class="bintang-label-jawaban">*</span></label>
                    <textarea class="caption_podcast form-control" name="caption_podcast" id="caption_podcast" placeholder="" required>
                    <?= $detail_podcast['caption_podcast']; ?>
                    </textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>