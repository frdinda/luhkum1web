<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">BERANDA</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-xl-12 col-xxl-12">
    <?php if ($id_akses == null || $id_akses == 'masyarakat' || $id_akses == 'super') { ?>
        <a href="<?= base_url("/tanya") ?>" type="button" class="btn btn-primary mt-2 mb-3">+ Buat Pertanyaan</a>
    <?php } ?>
    <a href="" type="button" class="btn btn-secondary mt-2 mb-3" data-toggle="modal" data-target="#FilterJenisKasus">Filter Jenis Kasus</a>
    <table class="mt-2" id="table-pertanyaan-all" style="width:100%">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- tr-nya dibuat foreach -->
            <?php foreach ($all_pertanyaan as $p) :
                if ($p['di_beranda'] == '1') { ?>
                    <tr>
                        <td>
                            <div class="row">
                                <!-- detail tanya ke spesifik pertanyaannya -->
                                <a href="<?= base_url("/detail-tanya/" . $p['id_pertanyaan']) ?>">
                                    <div class="col-11 card flex-fill w-100 pt-3">
                                        <div class="card-header">
                                            <h1 class="card-title mb-1 judul-pertanyaan"><?= $p['judul_pertanyaan']; ?></h1>
                                            <p class="mb-0">Pengirim: <?php if ($p['anonymous'] == '1') {
                                                                            echo $p['nama'];
                                                                        } else {
                                                                            echo "Anonymous";
                                                                        } ?></p>
                                        </div>
                                        <!-- gimana caranya biar yang muncul maksimal 140 kata -->
                                        <div class="card-body py-3 pt-0">
                                            <p>
                                                <?php $limit_uraian = strip_tags($p['uraian_pokok_permasalahan']);
                                                if (strlen($limit_uraian) > 500) {
                                                    $stringCut = substr($limit_uraian, 0, 300);
                                                    $endPoint = strrpos($stringCut, ' ');

                                                    $limit_uraian = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                    $limit_uraian .= '... <b>Baca Lebih Lanjut<b>';
                                                }
                                                echo $limit_uraian; ?>
                                            </p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </td>
                    </tr>
            <?php }
            endforeach; ?>
        </tbody>
    </table>

    <!-- Modal -->
    <div class="modal fade" id="FilterJenisKasus" tabindex="-1" role="dialog" aria-labelledby="FilterJenisKasusTitle" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLongTitle">Fitler Jenis Kasus</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form class="jenis-kasus mt-3" id="jenis-kasus" action="<?= base_url('/publik'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="modal-body">
                        <div class="mb-4">
                            <label class="label-pertanyaan mb-2" for="jenis-kasus">Jenis Kasus<span class="bintang-label-pertanyaan">*</span></label>
                            <select class="jenis-kasus form-select mb-3" name="jenis-kasus" id="jenis-kasus" required>
                                <!-- ADA PILIHAN ALL KASUS -->
                                <option value="" selected disabled>--Pilih Kasus--</option>
                                <option value="Semua Kasus">Semua Kasus</option>
                                <?php foreach ($all_kasus as $k) : ?>
                                    <option value="<?= $k['id_kasus']; ?>"><?= $k['jenis_kasus']; ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

</div>
<?= $this->endSection(); ?>