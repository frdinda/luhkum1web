<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">DAFTAR PERTANYAAN SAYA</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-xl-12 col-xxl-12">
    <a href="<?= base_url("/tanya") ?>" type="button" class="btn btn-primary mt-2 mb-3">+ Buat Pertanyaan</a>
    <table class="mt-2" id="table-pertanyaan-all" style="width:100%">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- tr-nya dibuat foreach khusus user ini aja -->
            <?php foreach ($all_pertanyaan as $p) : ?>
                <tr>
                    <td>
                        <div class="row">
                            <!-- detail tanya ke spesifik pertanyaannya -->
                            <a href="<?= base_url("/detail-tanya/" . $p['id_pertanyaan']) ?>">
                                <div class="card flex-fill w-100 pt-3">
                                    <div class="card-header">
                                        <h1 class="card-title mb-1 judul-pertanyaan"><?= $p['judul_pertanyaan']; ?></h1>
                                        <p class="mb-0">Pengirim: <?= $p['nama']; ?></p>
                                    </div>
                                    <!-- gimana caranya biar yang muncul maksimal 140 kata -->
                                    <div class="card-body py-3 pt-0">
                                        <p>
                                            <?php $limit_uraian = strip_tags($p['uraian_pokok_permasalahan']);
                                            if (strlen($limit_uraian) > 500) {
                                                $stringCut = substr($limit_uraian, 0, 500);
                                                $endPoint = strrpos($stringCut, ' ');

                                                $limit_uraian = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $limit_uraian .= '... <b>Baca Lebih Lanjut<b>';
                                            }
                                            echo $limit_uraian; ?>
                                        </p>
                                    </div>
                                    <div class="card-footer text-muted">
                                        <p class="">Status: <?php if ($p['status_pertanyaan'] == '1') {
                                                                echo "Telah Dijawab";
                                                            } else {
                                                                echo "Belum Dijawab";
                                                            } ?></p>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>