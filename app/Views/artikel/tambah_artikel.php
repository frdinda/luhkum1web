<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">TAMBAH ARTIKEL</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <!-- detail tanya ke spesifik pertanyaannya -->
    <div class="card flex-fill w-100 pt-3">
        <div class="card-body py-3 pt-0">
            <form class="buat-artikel mt-3" id="buat-artikel" action="<?= base_url('/artikel/save_artikel'); ?>" method="post">
                <?= csrf_field(); ?>
                <input type="hidden" class="email form-control" name="email" id="email" value="<?= $email; ?>" required>
                <div class="mb-4">
                    <label class="label-jawaban mb-2" for="judul_artikel">Judul Artikel<span class="bintang-label-jawaban">*</span></label>
                    <!-- nanti diganti sama rich text -->
                    <input type="text" class="judul_artikel form-control" name="judul_artikel" id="judul_artikel" placeholder="" required>
                </div>
                <div class="mb-4">
                    <label class="label-jawaban mb-2" for="isi_artikel">Isi Artikel<span class="bintang-label-jawaban">*</span></label>
                    <!-- nanti diganti sama rich text -->
                    <textarea class="isi_artikel form-control" name="isi_artikel" id="isi_artikel" placeholder="" required></textarea>
                </div>
                <div class="mb-3">
                    <button type="submit" class="btn btn-primary mb-3">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>