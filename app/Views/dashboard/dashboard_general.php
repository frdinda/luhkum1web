<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">DASHBOARD GENERAL</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
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
                                    <h5 class="card-title">Total Pertanyaan Terjawab</h5>
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
                                        <?php if ($id_akses == 'pimti' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv') { ?>
                                            <th>Status ACC</th>
                                        <?php } ?>
                                        <th>Nama Penyuluh</th>
                                        <th></th>
                                        <?php if ($id_akses == 'super') { ?>
                                            <th></th>
                                            <th></th>
                                        <?php } ?>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- tr-nya dibuat foreach -->
                                    <?php foreach ($all_pertanyaan as $p) : ?>
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
                                            <?php if ($id_akses == 'pimti' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv') { ?>
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
                                            <?php } ?>
                                            <td>
                                                <?php if (isset($p['email_penjawab'])) {
                                                    if ($p['id_akses'] == 'super') {
                                                        echo "Super Admin";
                                                    } else {
                                                        echo $p['nama'];
                                                    }
                                                } else {
                                                    echo "-";
                                                } ?>
                                            </td>
                                            <td class="text-center">
                                                <!-- khusus untuk yang status pertanyaan belum dijawab -->
                                                <?php if ($p['status_pertanyaan'] == '0' && $id_akses != 'pimti') { ?>
                                                    <a href="<?= base_url("/jawab/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">
                                                        Jawab
                                                    </a>
                                                <?php } else if ($p['status_pertanyaan'] == '1' && $id_akses != 'pimti' && ($p['email_penjawab'] == $email || $id_akses == 'super') && $p['acc_pimpinan'] == '0') { ?>
                                                    <a href="<?= base_url("/jawab/edit/" . $p['id_pertanyaan']) ?>" class="btn btn-danger">Edit</a>
                                                <?php } else if ($p['status_pertanyaan'] == '1' && $id_akses != 'pimti' && ($p['email_penjawab'] == $email || $id_akses == 'super') && $p['acc_pimpinan'] == null) { ?>
                                                    <a href="<?= base_url("/jawab/edit/" . $p['id_pertanyaan']) ?>" class="btn btn-secondary">Edit</a>
                                                <?php } else if ($p['status_pertanyaan'] == '1' && ($id_akses == 'pimti' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv') && $p['acc_pimpinan'] == null && ($p['jabatan_acc'] == $id_akses || $id_akses == 'pimti')) { ?>
                                                    <a href="<?= base_url("/jawab/acc/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">ACC</a>
                                                <?php } else if ($p['status_pertanyaan'] == '1' && ($id_akses == 'pimti' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv') && $p['acc_pimpinan'] == '1' && ($p['jabatan_acc'] == $id_akses || $id_akses == 'pimti')) { ?>
                                                    <a href="<?= base_url("/jawab/editacc/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">Edit ACC</a>
                                                <?php } else if ($p['status_pertanyaan'] == '1' && $p['email_penjawab'] == $email && ($id_akses == 'luhkum') && $p['acc_pimpinan'] == '1') { ?>
                                                    <a href="<?= base_url("/printpdf/" . $p['id_pertanyaan']) ?>" class="btn btn-success" target="_blank">Print</a>
                                                <?php } ?>
                                            </td>
                                            <?php if ($id_akses == 'super') { ?>
                                                <td class="text-center">
                                                    <?php if ($p['status_pertanyaan'] == '1' && $p['acc_pimpinan'] == null) { ?>
                                                        <a href="<?= base_url("/jawab/acc/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">ACC</a>
                                                    <?php } else if ($p['status_pertanyaan'] == '1' && $p['acc_pimpinan'] == '1') { ?>
                                                        <a href="<?= base_url("/jawab/editacc/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">Edit ACC</a>
                                                    <?php } ?>
                                                </td>
                                                <td class="text-center">
                                                    <?php if ($p['status_pertanyaan'] == '1' && $p['acc_pimpinan'] == '1') { ?>
                                                        <a href="<?= base_url("/printpdf/" . $p['id_pertanyaan']) ?>" class="btn btn-success" target="_blank">Print</a>
                                                    <?php } ?>
                                                </td>
                                            <?php } ?>
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