<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">BUAT PERTANYAAN</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <!-- <div class="card-header">
                <h5 class="card-title mb-0">Input</h5>
            </div> -->
            <!-- buat maksimal 100 kata -->
            <div class="card-body">
                <form class="buat-pertanyaan mt-3" id="buat-pertanyaan" action="<?= base_url('/tanya/ta33nya'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <!-- maksimal judul 100 huruf -->
                    <div class="mb-4">
                        <label class=" label-pertanyaan mb-2" for="judul-pertanyaan">Judul Pertanyaan<span class="bintang-label-pertanyaan">*</span></label>
                        <!-- put maximum disini, maximumnya 100 -->
                        <input type="text" class="judul-pertanyaan form-control" name="judul-pertanyaan" id="judul-pertanyaan" placeholder="" required>
                    </div>

                    <div class="mb-4">
                        <label class="label-pertanyaan mb-2" for="jenis-kasus">Jenis Kasus<span class="bintang-label-pertanyaan">*</span></label>
                        <select class="jenis-kasus form-select mb-3" name="jenis-kasus" id="jenis-kasus" required>
                            <option value="" selected disabled>--Pilih Kasus--</option>
                            <?php foreach ($all_kasus as $k) : ?>
                                <option value="<?= $k['id_kasus']; ?>"><?= $k['jenis_kasus']; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>

                    <!-- ini gaada maksimalnya -->
                    <div class="mb-4">
                        <label class="label-pertanyaan mb-2" for="isi-pertanyaan">Uraian Singkat Pokok Permasalahan dan Latar Belakangnya<span class="bintang-label-pertanyaan">*</span></label>
                        <!-- put maximum disini, maximumnya 3000 -->
                        <textarea name="isi-pertanyaan" class="isi-pertanyaan form-control" name="isi-pertanyaan" id="isi-pertanyaan" placeholder="" required></textarea>
                        <!--  -->
                    </div>

                    <!-- if nggak diceklis, dia ditampilkan pertanyannya -->
                    <div class="mb-3 ms-4">
                        <input class="di-beranda form-check-input" name="di-beranda" id="di-beranda" type="checkbox" value="0">
                        <span class="form-check-label ms-2">
                            jangan tampilkan di beranda publik
                        </span>
                    </div>

                    <!-- if nggak diceklis, dia ditampilkan namanya -->
                    <div class="mb-4 ms-4">
                        <input class="anonymous form-check-input" name="anonymous" id="anonymous" type="checkbox" value="0">
                        <span class="form-check-label ms-2">
                            jadikan anonymous di beranda publik
                        </span>
                    </div>

                    <!-- ttd -->
                    <div class="mb-4">
                        <div class="row">
                            <label class="label-pertanyaan mb-2" for="jenis-kasus">Tanda Tangan<span class="bintang-label-pertanyaan">*</span></label>
                        </div>
                        <div class="row ms-1">
                            <div class="col-md-12 ps-0">
                                <canvas id="sig-canvas" name="sig-canvas" class="sig-canvas" width="300" height="200">
                                    Get a better browser, bro.
                                </canvas>
                                <textarea id="sig-dataUrl" name="sig-dataUrl" class="form-control" rows="5" style="display:none;" required></textarea>
                            </div>
                        </div>
                        <div class="row ms-1 ps-0">
                            <button class="ms-0 ps-0 mt-0 pt-0 btn btn-default" id="sig-clearBtn" style="text-align:left;">Clear Signature</button>
                        </div>
                    </div>
                    <!-- end ttd -->

                    <div class="mb-3">
                        <button type="submit" id="sig-submitBtn" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>