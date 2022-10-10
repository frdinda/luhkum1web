<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">TAMBAH DATA AKSES</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <div class="card-body">
                <form class="ed_user mt-3" id="ed_user" action="<?= base_url('/tanya/save_pertanyaan'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-4">
                        <label class="label-pertanyaan mb-2" for="id_akses">ID Akses<span class="bintang-label-pertanyaan">*</span></label>
                        <input type="text" class="id_akses form-control" id="id_akses" placeholder="" required>
                    </div>
                    <div class="mb-4">
                        <label class="label-pertanyaan mb-2" for="jenis_akses">Jenis Akses<span class="bintang-label-pertanyaan">*</span></label>
                        <input type="text" class="jenis_akses form-control" id="jenis_akses" placeholder="" required>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>