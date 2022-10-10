<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">KELOLA DATA PERTANYAAN DAN JAWABAN</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <div class="card-body">
                <a href="<?= base_url("/tanya") ?>" type="button" class="btn btn-primary mt-2 mb-3">+ Tambah Pertanyaan</a>
                <div class="card-body table-responsive">
                    <table class="table cell-border mt-2" id="table-dashgen-all" style="width:100%">
                        <thead>
                            <tr>
                                <th>Tanggal</th>
                                <th>Judul</th>
                                <th>Jenis Kasus</th>
                                <th>Status</th>
                                <th>Nama Penyuluh</th>
                                <th></th>
                                <th></th>
                                <th></th>
                                <th></th>
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
                                            echo "Sudah Terjawab";
                                        } else {
                                            echo "Belum Terjawab";
                                        } ?>
                                        <!-- pengennya kalo belum dia warnanya merah, kalo udah dia warnanya ijo -->
                                    </td>
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
                                        <?php if ($p['status_pertanyaan'] == '0' && $id_akses != 'pimpinan') { ?>
                                            <a href="<?= base_url("/jawab/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">
                                                Jawab
                                            </a>
                                        <?php } else { ?>
                                            <a href="<?= base_url("/jawab/edit/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">Edit</a>
                                        <?php } ?>
                                        <!--  -->
                                    </td>
                                    <td class="text-center">
                                        <!-- khusus untuk yang status pertanyaan belum dijawab -->
                                        <?php if ($p['status_pertanyaan'] == '1' && $p['acc_pimpinan'] == null) { ?>
                                            <a href="<?= base_url("/jawab/acc/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">ACC</a>
                                        <?php } else if ($p['status_pertanyaan'] == '1' && $p['acc_pimpinan'] == '1') { ?>
                                            <a href="<?= base_url("/jawab/acc/" . $p['id_pertanyaan']) ?>" class="btn btn-primary">Edit ACC</a>
                                        <?php } ?>
                                        <!--  -->
                                    </td>
                                    <td>
                                        <?php if ($p['status_pertanyaan'] == '1' && $id_akses != 'pimpinan') { ?>
                                            <a href="<?= base_url("/printpdf/" . $p['id_pertanyaan']) ?>" target="_blank" class="btn btn-primary">
                                                PDF
                                            </a>
                                        <?php } ?>
                                    </td>
                                    <td>
                                        <form action="<?= base_url('/edit_pert/hapus/' . $p['id_pertanyaan']); ?>" method="post" class="d-inline">
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
</div>
<?= $this->endSection(); ?>