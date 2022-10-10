<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">DASHBOARD USER</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- isinya khusus untuk penyuluh itu, data yang diambil jadi sesuai id-penyuluh -->
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Pertanyaan</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?= $jumlah_pertanyaan; ?></h1>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Pertanyaan Terjawab User</h5>
                                </div>

                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?= $jumlah_pertanyaan_terjawab; ?></h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-header mt-3">
                            <h1 class="card-title mb-1 judul-pertanyaan">Daftar Pertanyaan</h1>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table cell-border mt-2" id="table-dashgen-all" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Jenis Kasus</th>
                                        <th>Status Terjawab</th>
                                        <th>Status ACC</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- tr-nya dibuat foreach -->
                                    <?php foreach ($all_pertanyaan_spesifik as $p) : ?>
                                        <tr>
                                            <td>
                                                <?= $p['tanggal_pertanyaan']; ?>
                                            </td>
                                            <td>
                                                <?= $p['judul_pertanyaan']; ?>
                                            </td>
                                            <td>
                                                <?= $p['jenis_kasus']; ?>
                                            </td>
                                            <td>
                                                <?php if ($p['status_pertanyaan'] == '1') {
                                                    echo "Sudah";
                                                } else {
                                                    echo "Belum";
                                                } ?>
                                                <!-- pengennya kalo belum dia warnanya merah, kalo udah dia warnanya ijo -->
                                            </td>
                                            <td>
                                                <?php if ($p['acc_pimpinan'] == '1') {
                                                    echo "Disetujui"; ?>
                                                    <br>
                                                    <a href="<?= base_url("/acc/detail/" . $p['id_pertanyaan']) ?>" style="color:black; text-decoration: underline;">
                                                        Keterangan
                                                    </a>
                                                <?php } else if ($p['acc_pimpinan'] == '0') {
                                                    echo "Tidak Disetujui"; ?>
                                                    <br>
                                                    <a href="<?= base_url("/acc/detail/" . $p['id_pertanyaan']) ?>" style="color:black; text-decoration: underline;">
                                                        Keterangan
                                                    </a>
                                                <?php } else if ($p['acc_pimpinan'] == null) {
                                                    echo "Belum Disetujui"; ?>
                                                    <br>
                                                <?php } ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- khusus untuk yang status pertanyaan belum dijawab -->
                                                <?php if ($p['status_pertanyaan'] == '0' && $id_akses != 'pimpinan') { ?>
                                                    <a href="<?= base_url("/jawab/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">
                                                        Jawab
                                                    </a>
                                                    <?php } else if ($p['email_penjawab'] == $email) {
                                                    if ($p['acc_pimpinan'] == null) { ?>
                                                        <a href="<?= base_url("/jawab/edit/" . $p['id_pertanyaan']) ?>" class="btn btn-secondary">Edit</a>
                                                    <?php } else if ($p['acc_pimpinan'] == '0') { ?>
                                                        <a href="<?= base_url("/jawab/edit/" . $p['id_pertanyaan']) ?>" class="btn btn-danger">Edit</a>
                                                    <?php } else if ($p['acc_pimpinan'] == '1') { ?>
                                                        <a href="<?= base_url("/printpdf/" . $p['id_pertanyaan']) ?>" class="btn btn-success" target="_blank">Print</a>
                                                <?php }
                                                } ?>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>