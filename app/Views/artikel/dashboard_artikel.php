<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">ARTIKEL</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- isinya khusus untuk penyuluh itu, data yang diambil jadi sesuai id-penyuluh -->
<div class="row">
    <div class="col-xl-12 col-xxl-12 d-flex">
        <div class="w-100">
            <div class="row">
                <!-- <div class="col-sm-6">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col mt-0">
                                    <h5 class="card-title">Total Artikel</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?= $jumlah_artikel; ?></h1>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-6 mb-3">
                    <a href="<?= base_url("/artikel/tambah/") ?>" class="btn btn-success">+ Tambah Artikel</a>
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
                            <h1 class="card-title mb-1 judul-pertanyaan">Daftar Artikel</h1>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table cell-border mt-2" id="table-dashgen-all" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th>Views</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- tr-nya dibuat foreach -->
                                    <?php foreach ($artikel_user as $p) : ?>
                                        <tr>
                                            <td>
                                                <?= $p['tanggal_artikel']; ?>
                                            </td>
                                            <td>
                                                <?= $p['judul_artikel']; ?>
                                            </td>
                                            <td>
                                                <!-- views -->
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $arr1 = explode('-', $p['tanggal_artikel']);
                                                $arr2 = implode('', $arr1);
                                                $code = $arr2 . '-' . $p['id_artikel'];
                                                ?>
                                                <a href="<?= base_url("/artikel/detail/" . $code) ?>" class="btn btn-primary">Detail</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url("/artikel/edit/" . $code) ?>" class="btn btn-secondary">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url("/artikel/hapus/" . $code) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a>
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