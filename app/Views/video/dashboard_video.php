<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">VIDEO USER</h1>
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
                                    <h5 class="card-title">Total Video</h5>
                                </div>
                                <div class="col-auto">
                                    <div class="stat text-primary">
                                        <i class="align-middle" data-feather="truck"></i>
                                    </div>
                                </div>
                            </div>
                            <h1 class="mt-1 mb-3"><?= $jumlah_video; ?></h1>
                        </div>
                    </div>
                </div> -->
                <div class="col-sm-6 mb-3">
                    <a href="<?= base_url("/video/tambah") ?>" class="btn btn-success">+ Tambah Video</a>
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
                            <h1 class="card-title mb-1 judul-pertanyaan">Daftar Video</h1>
                        </div>
                        <div class="card-body table-responsive">
                            <table class="table cell-border mt-2" id="table-dashgen-all" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>Judul</th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <!-- tr-nya dibuat foreach -->
                                    <?php foreach ($video_user as $p) : ?>
                                        <tr>
                                            <td class="col-9">
                                                <?= $p['judul_video']; ?>
                                            </td>
                                            <td>
                                                <a href="<?= $p['link_video']; ?>" class="btn btn-success" target="_blank">Link</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url("/video/detail/" . $p['id_video']) ?>" class="btn btn-primary">Detail</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url("/video/edit/" . $p['id_video']) ?>" class="btn btn-secondary">Edit</a>
                                            </td>
                                            <td class="text-center">
                                                <a href="<?= base_url("/video/hapus/" . $p['id_video']) ?>" class="btn btn-danger" onclick="return confirm('Anda Yakin?')">Hapus</a>
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