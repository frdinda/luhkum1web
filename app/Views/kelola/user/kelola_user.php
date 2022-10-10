<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">KELOLA DATA USER</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <div class="card-body">
                <a href="<?= base_url("/tmbuser") ?>" type="button" class="btn btn-primary mt-2 mb-3">+ Tambah User</a>
                <table class="mt-2 table table-hover" id="table-user-all" style="width:100%">
                    <thead>
                        <tr>
                            <th>Email</th>
                            <th>Akses</th>
                            <th>Nama</th>
                            <th>Tempat, Tanggal Lahir</th>
                            <th>Jenis Kelamin</th>
                            <th></th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <!-- tr-nya dibuat foreach khusus user ini aja -->
                        <?php foreach ($all_user as $a) : ?>
                            <tr>
                                <td>
                                    <?= $a['email']; ?>
                                </td>
                                <td>
                                    <?= $a['jenis_akses']; ?>
                                </td>
                                <td>
                                    <?= $a['nama']; ?>
                                </td>
                                <td>
                                    <?= $a['tempat_lahir']; ?>, <?php $originalDate = $a['tanggal_lahir'];
                                                                $newDate = date("d-m-Y", strtotime($originalDate));
                                                                echo $newDate; ?>
                                </td>
                                <td>
                                    <?php if ($a['jenis_kelamin'] == 'p') {
                                        echo "Perempuan";
                                    } else if ($a['jenis_kelamin'] == 'l') {
                                        echo "Laki-Laki";
                                    } ?>
                                </td>
                                <td>
                                    <a href="<?= base_url("/detu/" . $a['email']) ?>" type="button" class="btn btn-primary mt-2 mb-3">Detail</a>
                                </td>
                                <td>
                                    <a href="<?= base_url("/adminedu/" . $a['email']) ?>" type="button" class="btn btn-primary mt-2 mb-3">Edit</a>
                                </td>
                                <td>
                                    <form action="<?= base_url('/edit_user/hapus/' . $a['email']); ?>" method="post" class="d-inline">
                                        <?= csrf_field(); ?>
                                        <input type="hidden" name="_method" value="DELETE">
                                        <button class="btn btn-danger mt-2 mb-3" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
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