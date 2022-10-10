<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="description" content="Konsultasi Hukum &amp; Konsultasi Hukum Kantor Wilayah Kementerian Hukum dan HAM Sumatera Utara">
    <meta name="author" content="HUMAS_KUSUMA">
    <meta name="keywords" content="kemenkumham, hukum, konsultasi, penyuluhan, bantuan, pertanyaan, jawaban, masalah, warisan, notaris, hak asuh, harta, anak, adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/logo_fix.ico" />
    <link rel="canonical" href="https://demo-basic.adminkit.io/pages-sign-in.html" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link href="/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <title>Konsultasi Hukum</title>
</head>

<body>
    <main class="d-flex w-100">
        <div class="container d-flex flex-column">
            <div class="row vh-100">
                <div class="col-sm-10 col-md-10 col-lg-10 mx-auto d-table h-100">
                    <div class="d-table-cell align-middle">
                        <div class="text-center mt-6 mb-5">
                            <h1 class="h2">REGISTRASI</h1>
                            <p class="lead">
                                Memudahkan Anda untuk Berkonsultasi Hukum dengan Para Penyuluh Hukum Kami
                            </p>
                        </div>

                        <div class="card mb-6">
                            <div class="card-body">
                                <div class="m-sm-4">
                                    <form class="ed_user mt-3" id="ed_user" action="<?= base_url('/reg3is'); ?>" method="post">
                                        <?= csrf_field(); ?>
                                        <div class="mb-4">
                                            <label class="label-pertanyaan mb-2" for="email-pemohon">Email<span class="bintang-label-pertanyaan">*</span></label>
                                            <input type="text" class="email-pemohon form-control" name="email-pemohon" id="email-pemohon" placeholder="" required>
                                        </div>
                                        <div class="mb-4">
                                            <label class="label-pertanyaan mb-2" for="nama-pemohon">Nama<span class="bintang-label-pertanyaan">*</span></label>
                                            <input type="text" class="nama-pemohon form-control" name="nama-pemohon" id="nama-pemohon" placeholder="" required>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="label-pertanyaan mb-2" for="tempat-lahir-pemohon">Tempat Lahir<span class="bintang-label-pertanyaan">*</span></label>
                                                    <input type="text" class="tempat-lahir-pemohon form-control" name="tempat-lahir-pemohon" id="tempat-lahir-pemohon" placeholder="" required>
                                                </div>
                                                <div class="col-4">
                                                    <label class="label-pertanyaan mb-2" for="tanggal-lahir-pemohon">Tanggal Lahir<span class="bintang-label-pertanyaan">*</span></label>
                                                    <input type="date" class="tanggal-lahir-pemohon form-control" name="tanggal-lahir-pemohon" id="tanggal-lahir-pemohon" placeholder="" required>
                                                </div>
                                                <div class="col-4">
                                                    <label class="label-pertanyaan mb-2" for="no_telp">Nomor Whatsapp (cth: 628XXXXXXXX)<span class="bintang-label-pertanyaan">*</span></label>
                                                    <input type="text" class="no_telp form-control" name="no_telp" id="no_telp" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="label-pertanyaan mb-2" for="jenis-kelamin-pemohon">Jenis Kelamin<span class="bintang-label-pertanyaan">*</span></label>
                                                    <select class="jenis-kelamin-pemohon form-select mb-3" name="jenis-kelamin-pemohon" id="jenis-kelamin-pemohon" required>
                                                        <option value="" selected disabled>--Pilih Jenis Kelamin--</option>
                                                        <option value="p">Perempuan</option>
                                                        <option value="l">Laki-Laki</option>
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="label-pertanyaan mb-2" for="status-perkawinan-pemohon">Status Perkawinan<span class="bintang-label-pertanyaan">*</span></label>
                                                    <select class="status-perkawinan-pemohon form-select mb-3" name="status-perkawinan-pemohon" id="status-perkawinan-pemohon" required>
                                                        <option value="" selected disabled>--Pilih Status Perkawinan--</option>
                                                        <option value="Sudah Menikah">Sudah Menikah</option>
                                                        <option value="Belum Menikah">Belum Menikah</option>
                                                        <option value="Bercerai">Bercerai</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <label class="label-pertanyaan mb-2" for="tempat-tinggal-pemohon">Tempat Tinggal<span class="bintang-label-pertanyaan">*</span></label>
                                            <textarea class="tempat-tinggal-pemohon form-control" name="tempat-tinggal-pemohon" id="tempat-tinggal-pemohon" placeholder="" required></textarea>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-4">
                                                    <label class="label-pertanyaan mb-2" for="kelurahan-pemohon">Kelurahan/Desa<span class="bintang-label-pertanyaan">*</span></label>
                                                    <input type="text" class="kelurahan-pemohon form-control" name="kelurahan-pemohon" id="kelurahan-pemohon" placeholder="" required>
                                                </div>
                                                <div class="col-4">
                                                    <label class="label-pertanyaan mb-2" for="kecamatan-pemohon">Kecamatan<span class="bintang-label-pertanyaan">*</span></label>
                                                    <input type="text" class="kecamatan-pemohon form-control" name="kecamatan-pemohon" id="kecamatan-pemohon" placeholder="" required>
                                                </div>
                                                <div class="col-4">
                                                    <label class="label-pertanyaan mb-2" for="kabupaten-pemohon">Kabupaten/Kota<span class="bintang-label-pertanyaan">*</span></label>
                                                    <input type="text" class="kabupaten-pemohon form-control" name="kabupaten-pemohon" id="kabupaten-pemohon" placeholder="" required>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="mb-4">
                                            <div class="row">
                                                <div class="col-6">
                                                    <label class="label-pertanyaan mb-2" for="pendidikan-pemohon">Pendidikan Terakhir<span class="bintang-label-pertanyaan">*</span></label>
                                                    <!-- <input type="text" class="pendidikan-pemohon form-control" id="pendidikan-pemohon" placeholder="" required> -->
                                                    <select class="pendidikan-pemohon form-select mb-3" name="pendidikan-pemohon" id="pendidikan-pemohon" required>
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
                                                    </select>
                                                </div>
                                                <div class="col-6">
                                                    <label class="label-pertanyaan mb-2" for="pekerjaan-pemohon">Pekerjaan<span class="bintang-label-pertanyaan">*</span></label>
                                                    <input type="text" class="pekerjaan-pemohon form-control" name="pekerjaan-pemohon" id="pekerjaan-pemohon" placeholder="" required>
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
                                        <div class="mb-3 text-center">
                                            <button type="submit" class="btn btn-primary mb-3">Submit</button>
                                        </div>
                                        <div class="text-center mt-3">
                                            <span>
                                                <a href="<?= base_url("/login"); ?>">Sudah Memiliki Akun? Login Disini</a>
                                            </span>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </main>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-gtEjrD/SeCtmISkJkNUaaKMoLD0//ElJ19smozuHV6z3Iehds+3Ulb9Bn9Plx0x4" crossorigin="anonymous"></script>
    <script src="/js/script.js"></script>
    <script src="js/app.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.2/css/bootstrap.css"></script>
    <script src="https://cdn.datatables.net/1.10.25/css/dataTables.bootstrap4.min.css"></script>
    <script src="https://cdn.datatables.net/1.10.25/js/dataTables.bootstrap4.min.js"></script>
    <script src="/assets/extra-libs/datatables.net/js/jquery.dataTables.min.js"></script>
    <script src="/dist/js/pages/datatable/datatable-basic.init.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.3/js/dataTables.bootstrap5.min.js"></script>
    <!-- include summernote css/js -->
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
</body>

</html>