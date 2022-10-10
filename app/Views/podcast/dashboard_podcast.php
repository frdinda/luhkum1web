<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">PODCAST USER</h1>
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
                                    <h5 class="card-title">Total Podcast</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?= $jumlah_podcast; ?></h1>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-6 mb-3">
                    <a href="<?= base_url("/podcast/tambah") ?>" class="btn btn-success">+ Tambah Podcast</a>
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
                            <h1 class="card-title mb-1 judul-pertanyaan">Daftar Podcast</h1>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table cell-border mt-2" id="table-podcast-all" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Ket</th>
                                        <th>Tanggal</th>
                                        <th>Judul</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- tr-nya dibuat foreach -->
                                    <?php foreach ($podcast_user as $p) : ?>
                                        <tr>
                                            <td>
                                                <!-- BUG: H-nya nggak 24 jam jadi kalau same day dia masih coming soon terus -->
                                                <?php
                                                $time = date('Y-m-d H:i:s');
                                                if (strtotime($p['tanggal_podcast']) >= strtotime($time) || strtotime($p['tanggal_podcast']) == strtotime($time)) {
                                                    echo "coming soon / live";
                                                } else {
                                                    echo "recorded";
                                                }
                                                ?>
                                            </td>
                                            <td>
                                                <?= $p['tanggal_podcast']; ?>
                                            </td>
                                            <td>
                                                <?= $p['judul_podcast']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= $p['link_podcast']; ?>" class="btn btn-success" target="_blank">Link</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url("/podcast/detail/" . $p['id_podcast']) ?>" class="btn btn-primary">Detail</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url("/podcast/edit/" . $p['id_podcast']) ?>" class="btn btn-secondary">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url("/podcast/hapus/" . $p['id_podcast']) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a>
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