<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">EDIT DATA DIRI</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
    <div class="col-12 col-lg-12">
        <div class="card ps-3 pe-3">
            <div class="card-body">
                <!-- nanti data value dimasukkan dan diambil dari database user masyarakat -->
                <form class="ed_user mt-3" id="ed_user" action="<?= base_url('/user/save_user'); ?>" method="post">
                    <?= csrf_field(); ?>
                    <div class="mb-4">
                        <input type="hidden" class="email form-control" name="email-pemohon" id="email-pemohon" value="<?= $detail_user['email']; ?>" placeholder="" required>
                        <label class="label-pertanyaan mb-2" for="email-pemohon">Email</label>
                        <input type="text" class="email-pemohon form-control" name="email-pemohon" id="email-pemohon" placeholder="" value="<?= $detail_user['email']; ?>" disabled>
                    </div>
                    <div class="mb-4">
                        <label class="label-pertanyaan mb-2" for="jenis-akses">Jenis Akses<span class="bintang-label-pertanyaan">*</span></label>
                        <select class="jenis-akses form-select mb-3" name="jenis-akses" id="jenis-akses" required>
                            <?php foreach ($all_akses as $akses) :
                                if ($akses['id_akses'] == $detail_user['id_akses']) { ?>
                                    <option value="<?= $akses['id_akses']; ?>" selected><?= $akses['id_akses']; ?></option>
                                <?php } else { ?>
                                    <option value="<?= $akses['id_akses']; ?>"><?= $akses['id_akses']; ?></option>
                            <?php }
                            endforeach ?>
                        </select>
                    </div>
                    <div class="mb-4">
                        <label class="label-pertanyaan mb-2" for="nama-pemohon">Nama<span class="bintang-label-pertanyaan">*</span></label>
                        <input type="text" class="nama-pemohon form-control" name="nama-pemohon" id="nama-pemohon" placeholder="" value="<?= $detail_user['nama']; ?>" required>
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-4">
                                <label class="label-pertanyaan mb-2" for="tempat-lahir-pemohon">Tempat Lahir<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="text" class="tempat-lahir-pemohon form-control" name="tempat-lahir-pemohon" id="tempat-lahir-pemohon" value="<?= $detail_user['tempat_lahir']; ?>" required>
                            </div>
                            <div class="col-4">
                                <label class="label-pertanyaan mb-2" for="tanggal-lahir-pemohon">Tanggal Lahir<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="date" class="tanggal-lahir-pemohon form-control" name="tanggal-lahir-pemohon" id="tanggal-lahir-pemohon" value="<?= $detail_user['tanggal_lahir']; ?>" required>
                            </div>
                            <div class="col-4">
                                <label class="label-pertanyaan mb-2" for="no_telp">Nomor Whatsapp (cth: 628XXXXXXXX)<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="text" class="no_telp form-control" name="no_telp" id="no_telp" value="<?= $detail_user['no_telp']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-6">
                                <label class="label-pertanyaan mb-2" for="jenis-kelamin-pemohon">Jenis Kelamin<span class="bintang-label-pertanyaan">*</span></label>
                                <select class="jenis-kelamin-pemohon form-select mb-3" name="jenis-kelamin-pemohon" id="jenis-kelamin-pemohon" required>
                                    <?php if ($detail_user['jenis_kelamin'] == "p") { ?>
                                        <option disabled>--Pilih Jenis Kelamin--</option>
                                        <option value="p" selected>Perempuan</option>
                                        <option value="l">Laki-Laki</option>
                                    <?php } else if ($detail_user['jenis_kelamin'] == "l") { ?>
                                        <option disabled>--Pilih Jenis Kelamin--</option>
                                        <option value="p">Perempuan</option>
                                        <option value="p" selected>Laki-Laki</option>
                                    <?php
                                    } else { ?>
                                        <option selected disabled>--Pilih Jenis Kelamin--</option>
                                        <option value="p">Perempuan</option>
                                        <option value="l">Laki-Laki</option>
                                    <?php } ?>

                                </select>
                            </div>
                            <div class="col-6">
                                <label class="label-pertanyaan mb-2" for="status-perkawinan-pemohon">Status Perkawinan<span class="bintang-label-pertanyaan">*</span></label>
                                <select class="status-perkawinan-pemohon form-select mb-3" name="status-perkawinan-pemohon" id="status-perkawinan-pemohon" required>
                                    <?php if ($detail_user['status_perkawinan'] == "Sudah Menikah") { ?>
                                        <option disabled>--Pilih Status Perkawinan--</option>
                                        <option selected value="Sudah Menikah">Sudah Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Bercerai">Bercerai</option>
                                    <?php } else if ($detail_user['status_perkawinan'] == "Belum Menikah") { ?>
                                        <option disabled>--Pilih Status Perkawinan--</option>
                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                        <option selected value="Belum Menikah">Belum Menikah</option>
                                        <option value="Bercerai">Bercerai</option>
                                    <?php } else if ($detail_user['status_perkawinan'] == "Bercerai") { ?>
                                        <option disabled>--Pilih Status Perkawinan--</option>
                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option selected value="Bercerai">Bercerai</option>
                                    <?php } else { ?>
                                        <option selected disabled>--Pilih Status Perkawinan--</option>
                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                        <option value="Belum Menikah">Belum Menikah</option>
                                        <option value="Bercerai">Bercerai</option>
                                    <?php }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <label class="label-pertanyaan mb-2" for="tempat-tinggal-pemohon">Tempat Tinggal<span class="bintang-label-pertanyaan">*</span></label>
                        <textarea class="tempat-tinggal-pemohon form-control" name="tempat-tinggal-pemohon" id="tempat-tinggal-pemohon" placeholder="" required><?= $detail_user['tempat_tinggal']; ?></textarea>
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-4">
                                <label class="label-pertanyaan mb-2" for="kelurahan-pemohon">Kelurahan/Desa<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="text" class="kelurahan-pemohon form-control" name="kelurahan-pemohon" id="kelurahan-pemohon" value="<?= $detail_user['kelurahan']; ?>" required>
                            </div>
                            <div class="col-4">
                                <label class="label-pertanyaan mb-2" for="kecamatan-pemohon">Kecamatan<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="text" class="kecamatan-pemohon form-control" name="kecamatan-pemohon" id="kecamatan-pemohon" value="<?= $detail_user['kecamatan']; ?>" required>
                            </div>
                            <div class="col-4">
                                <label class="label-pertanyaan mb-2" for="kabupaten-pemohon">Kabupaten/Kota<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="text" class="kabupaten-pemohon form-control" name="kabupaten-pemohon" id="kabupaten-pemohon" value="<?= $detail_user['kabupaten']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-6">
                                <label class="label-pertanyaan mb-2" for="pendidikan-pemohon">Pendidikan<span class="bintang-label-pertanyaan">*</span></label>
                                <select class="pendidikan-pemohon form-select mb-3" name="pendidikan-pemohon" id="pendidikan-pemohon" required>
                                    <?php if ($detail_user['pendidikan'] == "Tidak/Belum Sekolah") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah" selected>Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "SD/Sederajat") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat" selected>SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "SLTP/Sederajat") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat" selected>SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "SLTA/Sederajat") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat" selected>SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "Diploma I") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I" selected>Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "Diploma II") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II" selected>Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "Diploma III") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III" selected>Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "Diploma IV") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV" selected>Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "Strata I") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I" selected>Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "Strata II") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II" selected>Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } else if ($detail_user['pendidikan'] == "Strata III") { ?>
                                        <option value="" disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III" selected>Strata III</option>
                                    <?php } else { ?>
                                        <option value="" selected disabled>--Pilih Pendidikan Terakhir--</option>
                                        <option value="Tidak/Belum Sekolah">Tidak/Belum Sekolah</option>
                                        <option value="SD/Sederajat">SD/Sederajat</option>
                                        <option value="SLTP/Sederajat">SLTP/Sederajat</option>
                                        <option value="SLTA/Sederajat">SLTA/Sederajat</option>
                                        <option value="Diploma I">Diploma I</option>
                                        <option value="Diploma II">Diploma II</option>
                                        <option value="Diploma III">Diploma III</option>
                                        <option value="Diploma IV">Diploma IV</option>
                                        <option value="Strata I">Strata I</option>
                                        <option value="Strata II">Strata II</option>
                                        <option value="Strata III">Strata III</option>
                                    <?php } ?>
                                </select>
                            </div>
                            <div class="col-6">
                                <label class="label-pertanyaan mb-2" for="pekerjaan-pemohon">Pekerjaan<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="text" class="pekerjaan-pemohon form-control" name="pekerjaan-pemohon" id="pekerjaan-pemohon" value="<?= $detail_user['pekerjaan']; ?>" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-4">
                        <div class="row">
                            <div class="col-6">
                                <label class="label-pertanyaan mb-2" for="password_user">Password<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="password" class="password_user form-control" name="password_user" id=" password_user" placeholder="" required>
                            </div>
                            <div class="col-6">
                                <label class="label-pertanyaan mb-2" for="konfirmasi_password_user">Konfirmasi Password<span class="bintang-label-pertanyaan">*</span></label>
                                <input type="password" class="konfirmasi_password_user form-control" name="konfirmasi_password_user" id="konfirmasi_password_user" placeholder="" required>
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" class="btn btn-primary mb-3">Submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection(); ?>