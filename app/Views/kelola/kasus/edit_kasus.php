<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">EDIT DATA KASUS</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <div class="card-body">
                <!-- nanti data value dimasukkan dan diambil dari database user masyarakat -->
                <form class="ed_user mt-3" id="ed_user" action="<?= base_url('/edit_kasus/save'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-4">
                        <input type="hidden" class="id_kasus form-control" name="id_kasus" id="id_kasus" value="<?= $detail_kasus['id_kasus']; ?>" placeholder="" required>
                        <label class="label-pertanyaan mb-2" for="id_kasus">ID Kasus<span class="bintang-label-pertanyaan">*</span></label>
                        <input type="text" class="id_kasus form-control" id="id_kasus" value="<?= $detail_kasus['id_kasus']; ?>" placeholder="" disabled>
                    </div>
                    <div class="mb-4">
                        <label class="label-pertanyaan mb-2" for="jenis_kasus">Jenis Kasus<span class="bintang-label-pertanyaan">*</span></label>
                        <input type="text" class="jenis_kasus form-control" name="jenis_kasus" id="jenis_kasus" value="<?= $detail_kasus['jenis_kasus']; ?>" placeholder="" required>
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