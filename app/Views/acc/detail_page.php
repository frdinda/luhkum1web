<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">PERSETUJUAN JAWABAN</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<!-- ada dua card, satu untuk pertanyaan satunya lagi untuk jawabannya. dari card yang satu ke yang lain nggak pala jauh mb/mt-nya nanti -->
<div class="row">
    <!-- detail tanya ke spesifik pertanyaannya -->
    <div class="card flex-fill w-100 pt-3">
        <div class="card-header">
            <h1 class="card-title mb-1 judul-pertanyaan"><?= $dp['judul_pertanyaan']; ?></h1>
            <p class="mb-0">Pengirim: <?php if ($id_akses == 'super' || $id_akses == 'luhkum') {
                                            echo  $dp['nama'];
                                        } else if ($dp['anonymous'] == '1') {
                                            echo  $dp['nama'];
                                        } else {
                                            echo "Anonymous";
                                        } ?></p>
            <!-- kalau di klik edit jenis kasus, muncul kayak windows alert gitu (how? gue cuma bisa page aja) yang nampilin form edit jenis kasus, formnya kayak form buat pertanyaan tapi yang bisa diedit cuma bagian jenis kasus aja -->
            <!-- a href ini warnanya dikhususin, kasih text-decoration underline juga kalo hover biar nampak bisa diklik -->
            <p class="mb-0">Jenis Kasus: <?= $dp['jenis_kasus']; ?> <?php if ($id_akses == 'super' || $id_akses == 'luhkum') { ?><a class="edit-jenis-kasus with-text-decoration" href="" data-toggle="modal" data-target="#EditJenisKasus">(edit jenis kasus)</a><?php } ?></p>
        </div>
        <div class="card-body py-3 pt-0">
            <p><?= $dp['uraian_pokok_permasalahan']; ?></p>
        </div>

        <!-- Modal -->
        <div class="modal fade" id="EditJenisKasus" tabindex="-1" role="dialog" aria-labelledby="EditJenisKasusTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLongTitle">Edit Pertanyaan</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <form class="edit-jenis-kasus mt-3" id="edit-jenis-kasus" action="<?= base_url('/detail-tanya/edit_kasus'); ?>" method="post">
                        <?= csrf_field(); ?>
                        <div class="modal-body">
                            <div class="mb-4">
                                <!-- if dia super admin, dia bisa ngedit ini, kalau bukan dia gabisa -->
                                <?php if ($id_akses == 'super') {
                                ?>
                                    <label class=" label-pertanyaan mb-2" for="judul-pertanyaan">Judul Pertanyaan<span class="bintang-label-pertanyaan">*</span></label>
                                    <input type="hidden" class="id-pertanyaan form-control" name="id-pertanyaan" id="id-pertanyaan" placeholder="" value="<?= $dp['id_pertanyaan']; ?>" required>
                                    <input type="text" class="judul-pertanyaan form-control" name="judul-pertanyaan" id="judul-pertanyaan" placeholder="" value="<?= $dp['judul_pertanyaan']; ?>">
                                <?php
                                } else { ?>
                                    <label class=" label-pertanyaan mb-2" for="judul-pertanyaan">Judul Pertanyaan<span class="bintang-label-pertanyaan">*</span></label>
                                    <input type="hidden" class="id-pertanyaan form-control" name="id-pertanyaan" id="id-pertanyaan" placeholder="" value="<?= $dp['id_pertanyaan']; ?>" required>
                                    <input type="text" class="judul-pertanyaan form-control" name="judul-pertanyaan" id="judul-pertanyaan" placeholder="" value="<?= $dp['judul_pertanyaan']; ?>" disabled>
                            </div>
                        <?php } ?>

                        <div class="mb-4">
                            <label class="label-pertanyaan mb-2" for="jenis-kasus">Jenis Kasus<span class="bintang-label-pertanyaan">*</span></label>
                            <select class="jenis-kasus form-select mb-3" name="jenis-kasus" id="jenis-kasus" required>
                                <option value="" selected disabled>--Pilih Kasus--</option>
                                <!-- pake if -->
                                <?php foreach ($all_kasus as $k) :
                                    if ($k['id_kasus'] == $dp['id_kasus']) { ?>
                                        <option value="<?= $k['id_kasus']; ?>" selected><?= $k['jenis_kasus']; ?></option>
                                    <?php } else { ?>
                                        <option value="<?= $k['id_kasus']; ?>"><?= $k['jenis_kasus']; ?></option>
                                <?php }
                                endforeach; ?>
                            </select>
                        </div>

                        <!-- ini gaada maksimalnya -->
                        <div class="mb-4">
                            <!-- if dia super admin dia bisa ngedit ini, kalau bukan dia gabisa -->
                            <?php if ($id_akses == 'super') { ?>
                                <label class="label-pertanyaan mb-2" for="isi-pertanyaan">Uraian Singkat Pokok Permasalahan dan Latar Belakangnya<span class="bintang-label-pertanyaan">*</span></label>
                                <textarea class="isi-pertanyaan form-control" name="isi-pertanyaan" id="isi-pertanyaan" placeholder="" style="display:none;" required><?= $dp['uraian_pokok_permasalahan']; ?></textarea>
                                <textarea class="isi-pertanyaan form-control" id="isi-pertanyaan" placeholder=""><?= $dp['uraian_pokok_permasalahan']; ?></textarea>
                            <?php } else { ?>
                                <label class="label-pertanyaan mb-2" for="isi-pertanyaan">Uraian Singkat Pokok Permasalahan dan Latar Belakangnya<span class="bintang-label-pertanyaan">*</span></label>
                                <textarea class="isi-pertanyaan form-control" name="isi-pertanyaan" id="isi-pertanyaan" placeholder="" style="display:none;" required><?= $dp['uraian_pokok_permasalahan']; ?></textarea>
                                <textarea class="isi-pertanyaan form-control" id="isi-pertanyaan" placeholder="" disabled><?= $dp['uraian_pokok_permasalahan']; ?></textarea>
                            <?php } ?>
                        </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
                            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- ATAU kita buat aja langsung disini form buat jawabannya, kalau udah dijawab hilang -->
    <?php if ($dp['status_pertanyaan'] == 0) {
        if ($id_akses == 'pimti' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv' || $id_akses == 'super' || ($id_akses == 'luhkum' && $email == $dp['email_penjawab'])) {
    ?>
            <div class="card-body py-3 pt-0 mt-3">
                <h3>Pertanyaan ini belum memiliki jawaban</h3>
            </div>
        <?php
        } else { ?>
            <div class="card-body py-3 pt-0 mt-3">
                <h3>Page Tidak Ditemukan</h3>
            </div>
        <?php }
    } else if ($dp['status_pertanyaan'] == 1) {
        if ($id_akses == 'pimti' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv' || $id_akses == 'super' || ($id_akses == 'luhkum' && $email == $dp['email_penjawab'])) { ?>
            <!-- ini kalo jabatan acc sama kayak yang dipilih luhkum waktu mereka jawab -->
            <div class="card flex-fill w-100 pt-3">
                <div class="card-header">
                    <h1 class="card-title mb-1">Jawaban</h1>
                    <!-- ke link ke profil penyuluh hukum yg bersangkutan -->
                    <a class="no-text-decoration" href="">
                        <p class="mb-0">Penyuluh: <?= $nama_penjawab; ?></p>
                    </a>
                </div>
                <div class="card-body py-3 pt-0 mt-3">
                    <?= $dp['nasihat_yuridis']; ?>
                </div>
            </div>
            <div class="card flex-fill w-100 pt-3">
                <div class="card-header">
                    <h1 class="card-title mb-1">Persetujuan Pimpinan</h1>
                    <!-- ke link ke profil penyuluh hukum yg bersangkutan -->
                    <a class="no-text-decoration" href="">
                        <p class="mb-0">Penyetuju: <?= $nama_pimpinan; ?></p>
                    </a>
                </div>
                <div class="card-body py-3 pt-0 mt-3">
                    <?php  ?>
                    <div class="mb-4">
                        <p><b>Tanggal ACC:</b> <?php
                                                $tanggal_acc = strtotime($dp['tanggal_acc']);
                                                $day = date('d', $tanggal_acc);
                                                $month = date('m', $tanggal_acc);
                                                $year = date('Y', $tanggal_acc);
                                                if ($month == 01) {
                                                    $month = 'Januari';
                                                } else if ($month == 02) {
                                                    $month = 'Februari';
                                                } else if ($month == 02) {
                                                    $month = 'Februari';
                                                } else if ($month == 03) {
                                                    $month = 'Maret';
                                                } else if ($month == 04) {
                                                    $month = 'April';
                                                } else if ($month == 05) {
                                                    $month = 'Mei';
                                                } else if ($month == 06) {
                                                    $month = 'Juni';
                                                } else if ($month == 07) {
                                                    $month = 'Juli';
                                                } else if ($month == '08') {
                                                    $month = 'Agustus';
                                                } else if ($month == '09') {
                                                    $month = 'September';
                                                } else if ($month == 10) {
                                                    $month = 'Oktober';
                                                } else if ($month == 11) {
                                                    $month = 'November';
                                                } else if ($month == 12) {
                                                    $month = 'Desember';
                                                }

                                                echo $day . " " . $month . " " . $year;
                                                ?></p>
                    </div>
                    <div class="mb-4">
                        <p>
                            <b>Status Persetujuan:</b> <?php if ($dp['acc_pimpinan'] == '1') {
                                                            echo ("Setujui");
                                                        } else if ($dp['acc_pimpinan'] == '0') {
                                                            echo ("Tidak Disetujui");
                                                        } else {
                                                            echo ("Belum Disetujui");
                                                        } ?>
                        </p>
                    </div>
                    <div class="mb-4">
                        <p><b>Keterangan:</b>
                            <?= $dp['keterangan_pimpinan']; ?></p>
                    </div>
                </div>
            </div>
        <?php
        } else { ?>
            <div class="card-body py-3 pt-0 mt-3">
                <h3>Page Tidak Ditemukan</h3>
            </div>
        <?php } ?>
    <?php } ?>



</div>


<?= $this->endSection(); ?>