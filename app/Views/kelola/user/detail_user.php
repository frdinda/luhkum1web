<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">DETAIL DATA USER</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <div class="card-body">
                <table class="mt-2 table table-hover" id="table-detail-user" style="width:100%">
                    <tbody>
                        <!-- tr-nya dibuat foreach khusus user ini aja??? -->
                        <tr>
                            <td>
                                Email
                            </td>
                            <td>
                                <?= $all_user['email']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Akses
                            </td>
                            <td>
                                <?= $all_user['jenis_akses']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nama
                            </td>
                            <td>
                                <?= $all_user['nama']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tempat, Tanggal Lahir
                            </td>
                            <td>
                                <?= $all_user['tempat_lahir']; ?>, <?php $originalDate = $all_user['tanggal_lahir'];
                                                                    $newDate = date("d-m-Y", strtotime($originalDate));
                                                                    echo $newDate; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Nomor Telepon (Whatsapp)
                            </td>
                            <td>
                                <!-- https://wa.me/6281234567890 -->
                                <a src="https://wa.me/<?= $all_user['no_telp'];?>" target="_blank">
                                    <?= $all_user['no_telp']; ?>
                                </a>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Jenis Kelamin
                            </td>
                            <td>
                                <?= $all_user['jenis_kelamin']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Status Perkawinan
                            </td>
                            <td>
                                <?= $all_user['status_perkawinan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Tempat Tinggal
                            </td>
                            <td>
                                <?= $all_user['tempat_tinggal']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kelurahan/Desa
                            </td>
                            <td>
                                <?= $all_user['kelurahan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kecamatan
                            </td>
                            <td>
                                <?= $all_user['kecamatan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Kabupaten/Kota
                            </td>
                            <td>
                                <?= $all_user['kabupaten']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pendidikan
                            </td>
                            <td>
                                <?= $all_user['pendidikan']; ?>
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Pekerjaan
                            </td>
                            <td>
                                <?= $all_user['pekerjaan']; ?>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <div class="mt-1">
                    <a href="<?= base_url("/adminedu/" . $all_user['email']) ?>" type="button" class="btn btn-primary mt-3 mb-3">Edit</a>
                    <!-- <form action="<?= base_url('/edit_user/hapus/' . $all_user['email']); ?>" method="post" class="d-inline"> -->
                    <form action="#" method="post" class="d-inline mt-1 mb-3 ms-3">
                        <?= csrf_field(); ?>
                        <input type="hidden" name="_method" value="DELETE">
                        <button class="btn btn-danger" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
                    </form>
                </div>
                <div>

                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>