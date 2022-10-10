<?= $this->extend('layout/template'); ?>

<?= $this->section('title'); ?>
<h1 class="navbar-align judul">EDIT JAWABAN</h1>
<?= $this->endSection(); ?>

<?= $this->section('content'); ?>
<div class="row">
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
            <p class="mb-0">Jenis Kasus: <?= $dp['jenis_kasus']; ?> <?php if ($id_akses == 'super' || $id_akses == 'luhkum') { ?><a class="edit-jenis-kasus with-text-decoration" href="" data-toggle="modal" data-target="#EditJenisKasus">(edit jenis kasus)</a><?php } ?></p>
        </div>
        <div class="card-body py-3 pt-0">
            <p><?= $dp['uraian_pokok_permasalahan']; ?></p>
        </div>
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

<!-- tiap input valuenya sesuain sama database -->
<div class="card flex-fill w-100 pt-3">
    <div class="card-header">
        <h1 class="card-title mb-1">Buat Jawaban</h1>
        <!-- nama penyuluh otomatis muncul disini sesuai sama yang tertulis di data diri -->
        <p class="mb-0">Penyuluh: <?php if (isset($data_penyuluh)) {
                                        echo $data_penyuluh['nama'];
                                    } else {
                                        echo "Super Admin";
                                    } ?></p>
    </div>
    <div class="card-body py-3 pt-0">
        <form class="buat-jawaban mt-3" id="buat-jawaban" action="<?= base_url('/jawab/edit_jawaban'); ?>" method="post">
            <?= csrf_field(); ?>
            <input type="hidden" class="id-pertanyaan form-control" name="id-pertanyaan" id="id-pertanyaan" value="<?= $dp['id_pertanyaan']; ?>" required>
            <input type="hidden" class="email-penjawab form-control" name="email-penjawab" id="email-penjawab" value="<?= $email; ?>" required>
            <div class="mb-4">
                <div class="row">
                    <div class="col-4">
                        <label class="label-jawaban mb-2" for="tempat-pelaksanaan-konsultasi">Tempat Pelaksanaan Konsultasi Hukum<span class="bintang-label-jawaban">*</span></label>
                        <input type="text" class="tempat-pelaksanaan-konsultasi form-control" name="tempat-pelaksanaan-konsultasi" id="tempat-pelaksanaan-konsultasi" placeholder="" value="<?= $dp['tempat_konsultasi']; ?>" required>
                    </div>
                    <div class="col-8">
                        <label class="label-jawaban mb-2" for="waktu-pelaksanaan-konsultasi">Waktu Pelaksanaan Konsultasi Hukum<span class="bintang-label-jawaban">*</span></label>
                        <input type="date" class="waktu-pelaksanaan-konsultasi form-control" name="waktu-pelaksanaan-konsultasi" id="waktu-pelaksanaan-konsultasi" placeholder="" value="<?= $dp['waktu_konsultasi']; ?>" required>
                    </div>
                </div>
            </div>
            <!-- <div class="mb-4"> 
                    <label class="label-jawaban mb-2" for="isi-jawaban">Uraian Singkat Pokok Permasalahan dan Latar Belakangnya<span class="bintang-label-jawaban">*</span></label> -->
            <!-- nanti diganti sama rich text -->
            <!-- <textarea class="isi-jawaban form-control" id="isi-jawaban" placeholder="" required>
                        </textarea>
                </div> -->
            <div class="mb-4">
                <label class="label-jawaban mb-2" for="nasihat-yuridis">Nasihat yang Diberikan Konsultan Termasuk Aspek Yuridisnya<span class="bintang-label-jawaban">*</span></label>
                <!-- nanti diganti sama rich text -->
                <textarea class="nasihat-yuridis form-control" name="nasihat-yuridis" id="nasihat-yuridis" placeholder="" value="" required><?= $dp['nasihat_yuridis']; ?></textarea>
            </div>
            <div class="mb-4">
                <label class="label-jawaban mb-2" for="hasil-akhir-konsultasi">Hasil Akhir Konsultasi<span class="bintang-label-jawaban">*</span></label>
                <!-- nanti diganti sama rich text -->
                <textarea class="hasil-akhir-konsultasi form-control" name="hasil-akhir-konsultasi" id="hasil-akhir-konsultasi" placeholder="" value="" required><?= $dp['hasil_akhir_konsultasi']; ?></textarea>
            </div>
            <div class="mb-4">
                <label class="label-jawaban mb-2" for="kesan-konsultan">Kesan Konsultan Atas Tingkat Pengetahuan/Kesadaran Hukum Pemohon<span class="bintang-label-jawaban">*</span></label>
                <!-- nanti diganti sama rich text -->
                <textarea class="kesan-konsultan form-control" name="kesan-konsultan" id="kesan-konsultan" placeholder="" value="" required><?= $dp['kesan_konsultan']; ?></textarea>
            </div>
            <div class="mb-4">
                <label class="label-jawaban mb-2" for="jabatan-acc">Jabatan Penjawab<span class="bintang-label-jawaban">*</span></label>
                <!-- nanti diganti sama rich text -->
                <select class="jabatan-acc form-select mb-3" name="jabatan-acc" id="jabatan-acc" required>
                    <?php if ($dp['jabatan_acc'] == 'kasub') { ?>
                        <option value="" disabled>--Pilih Kasus--</option>
                        <option value="kasub" selected>Ahli Pertama</option>
                        <option value="kabid">Ahli Muda</option>
                        <option value="kadiv">Ahli Madya</option>
                    <?php } else if ($dp['jabatan_acc'] == 'muda') { ?>
                        <option value="" disabled>--Pilih Kasus--</option>
                        <option value="kasub">Ahli Pertama</option>
                        <option value="kabid" selected>Ahli Muda</option>
                        <option value="kadiv">Ahli Madya</option>
                    <?php } else if ($dp['jabatan_acc'] == 'madya') { ?>
                        <option value="" disabled>--Pilih Kasus--</option>
                        <option value="kasub">Ahli Pertama</option>
                        <option value="kabid">Ahli Muda</option>
                        <option value="kadiv" selected>Ahli Madya</option>
                    <?php } else { ?>
                        <option value="" selected disabled>--Pilih Kasus--</option>
                        <option value="kasub">Ahli Pertama</option>
                        <option value="kabid">Ahli Muda</option>
                        <option value="kadiv">Ahli Madya</option>
                    <?php } ?>
                </select>
            </div>
            <!-- ttd -->
            <div class="mb-4">
                <div class="row">
                    <label class="label-pertanyaan mb-2" for="jenis-kasus">Tanda Tangan<span class="bintang-label-pertanyaan">*</span></label>
                </div>
                <div class="row ms-1">
                    <div class="col-md-12 ps-0">
                        <canvas id="sig-canvas" name="sig-canvas" class="sig-canvas" width="300" height="200">
                            Get a better browser, bro.
                        </canvas>
                        <textarea id="sig-dataUrl" name="sig-dataUrl" class="form-control" rows="5" style="display:none;" required></textarea>
                    </div>
                </div>
                <div class="row ms-1 ps-0">
                    <a class="ms-0 ps-0 mt-0 pt-0 btn btn-default" id="sig-clearBtn" style="text-align:left; color:black;">Clear Signature</a>
                </div>
            </div>
            <!-- end ttd -->
            <div class="mb-3">
                <button type="submit" class="btn btn-primary mb-3">Submit</button>
            </div>
        </form>
        <div class="col-1 ps-0">
            <form action="<?= base_url('/jawab/hapus_jawaban'); ?>" method="post" class="">
                <?= csrf_field(); ?>
                <!-- <input type="hidden" name="_method" value="DELETE"> -->
                <input type="hidden" class="id-pertanyaan form-control" name="id-pertanyaan" id="id-pertanyaan" value="<?= $dp['id_pertanyaan']; ?>" required>
                <button class="btn btn-danger table" type="submit" onclick="return confirm('Anda Yakin?')">Hapus</button>
            </form>
        </div>
    </div>
</div>
<!-- end dari form -->
</div>
<?= $this->endSection(); ?>