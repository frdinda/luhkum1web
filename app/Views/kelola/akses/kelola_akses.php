<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">KELOLA AKSES</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <div class="card-body">
                <a href="<?= base_url("/tmbakses") ?>" type="button" class="btn btn-primary mt-2 mb-3">+ Tambah Akses</a>
                <table class="mt-2 table table-hover" id="table-user-all" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Akses</th>
                            <th>Jenis Akses</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- tr-nya dibuat foreach khusus user ini aja -->
                        <tr>
                            <td>
                                aks_1
                            </td>
                            <td>
                                Super Admin
                            </td>
                            <td>
                                <a href="<?= base_url("/adminedaks") ?>" type="button" class="btn btn-primary mt-2 mb-3">Edit</a>
                            </td>
                            <td>
                                <!-- <form action="<?= base_url('/edit_user/hapus/' . $u['user_id']); ?>" method="post" class="d-inline"> -->
                                <form action="#" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                aks_2
                            </td>
                            <td>
                                Penyuluh
                            </td>
                            <td>
                                <a href="<?= base_url("/adminedaks") ?>" type="button" class="btn btn-primary mt-2 mb-3">Edit</a>
                            </td>
                            <td>
                                <!-- <form action="<?= base_url('/edit_user/hapus/' . $u['user_id']); ?>" method="post" class="d-inline"> -->
                                <form action="#" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                aks_3
                            </td>
                            <td>
                                Pimpinan
                            </td>
                            <td>
                                <a href="<?= base_url("/adminedaks") ?>" type="button" class="btn btn-primary mt-2 mb-3">Edit</a>
                            </td>
                            <td>
                                <!-- <form action="<?= base_url('/edit_user/hapus/' . $u['user_id']); ?>" method="post" class="d-inline"> -->
                                <form action="#" method="post" class="d-inline">
                                    <?= csrf_field(); ?>
                                    <input type="hidden" name="_method" value="DELETE">
                                    <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>