<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">KELOLA KASUS</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <div class="card-body">
                <a href="<?= base_url("/tmbkasus") ?>" type="button" class="btn btn-primary mt-2 mb-3">+ Tambah Kasus</a>
                <table class="mt-2 table table-hover" id="table-user-all" style="width:100%">
                    <thead>
                        <tr>
                            <th>ID Kasus</th>
                            <th>Jenis Kasus</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- tr-nya dibuat foreach khusus user ini aja -->
                        <?php foreach ($all_kasus as $a) : ?>
                            <tr>
                                <td>
                                    <?= $a['id_kasus']; ?>
                                </td>
                                <td>
                                    <?= $a['jenis_kasus']; ?>
                                </td>
                                <td>
                                    <a href="<?= base_url("/adminedkas/" . $a['id_kasus']) ?>" type="button" class="btn btn-primary mt-2 mb-3">Edit</a>
                                </td>
                                <td>
                                    <form action="<?= base_url('/edit_kasus/hapus/' . $a['id_kasus']); ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>