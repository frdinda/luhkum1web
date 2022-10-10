<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">LIST ARTIKEL</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="col-xl-12 col-xxl-12">
    <table class="mt-2" id="table-pertanyaan-all" style="width:100%">
        <thead>
            <tr>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <!-- tr-nya dibuat foreach khusus user ini aja -->
            <?php foreach ($all_artikel as $p) : ?>
                <tr>
                    <td>
                        <div class="row">
                            <!-- detail tanya ke spesifik pertanyaannya -->
                            <?php
                            $arr1 = explode('-', $p['tanggal_artikel']);
                            $arr2 = implode('', $arr1);
                            $code = $arr2 . '-' . $p['id_artikel'];
                            ?>
                            <a href="<?= base_url("/artikel/detail/" . $code) ?>">
                                <div class="card flex-fill w-100 pt-3">
                                    <div class="card-header">
                                        <h1 class="card-title mb-1 judul-artikel"><?= $p['judul_artikel']; ?></h1>
                                        <p class="mb-0">Penulis: <?= $p['nama']; ?></p>
                                    </div>
                                    <!-- gimana caranya biar yang muncul maksimal 140 kata -->
                                    <div class="card-body py-3 pt-0">
                                        <p>
                                            <?php $limit_uraian = strip_tags($p['isi_artikel']);
                                            if (strlen($limit_uraian) > 500) {
                                                $stringCut = substr($limit_uraian, 0, 500);
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
            <?php endforeach; ?>
        </tbody>
    </table>
</div>
<?= $this->endSection(); ?>