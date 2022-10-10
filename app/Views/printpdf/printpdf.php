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
    <link rel="shortcut icon" href="img/icons/icon-48x48.png" />
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
    <span class="main print">
        <h2 class="col judul align-self-center" style="text-align:center;">FORMULIR KONSULTASI HUKUM</h2>
        <br>
        <span class="row mb-5 data-pemohon">
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px">
                            <h3>I.</h3>
                        </td>
                        <td>
                            <h3>DATA PEMOHON/KLIEN</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-2 data-pemohon" id="table-dashgen-all" style="width:100%;">
                <tbody>
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:20px">1.</td>
                        <td style="width:150px">Nama</td>
                        <td style="width:15px">:</td>
                        <td style="width:270px"><?= $data_penanya['nama']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td>2.</td>
                        <td>Tempat/Tanggal Lahir</td>
                        <td>:</td>
                        <td><?= $data_penanya['tempat_lahir']; ?>, <?php
                                                                    $newDate = date("d-m-Y", strtotime($data_penanya['tanggal_lahir']));
                                                                    echo $newDate; ?></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td>3.</td>
                        <td>Jenis Kelamin</td>
                        <td>:</td>
                        <td><?php if ($data_penanya['jenis_kelamin'] == "p") {
                                echo "Perempuan";
                            } else {
                                echo "Laki-Laki";
                            } ?></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td>4.</td>
                        <td>Status Perkawinan</td>
                        <td>:</td>
                        <td><?= $data_penanya['status_perkawinan']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td>5.</td>
                        <td style="text-align: justify;">Tempat Tinggal (Alamat)</td>
                        <td>:</td>
                        <td><?= $data_penanya['tempat_tinggal']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td>6.</td>
                        <td>Kelurahan/Desa</td>
                        <td></td>
                        <td></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td></td>
                        <td>a. Kecamatan</td>
                        <td>:</td>
                        <td><?= $data_penanya['kecamatan']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td></td>
                        <td>b. Kabupaten/Kota</td>
                        <td>:</td>
                        <td><?= $data_penanya['kabupaten']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td>7.</td>
                        <td>Pendidikan</td>
                        <td>:</td>
                        <td><?= $data_penanya['pendidikan']; ?></td>
                    </tr>
                    <tr>
                        <td style="width:40px"></td>
                        <td>8.</td>
                        <td>Pekerjaan</td>
                        <td>:</td>
                        <td><?= $data_penanya['pekerjaan']; ?></td>
                    </tr>
                </tbody>
            </table>
        </span>
        <br>
        <span class="row mb-5 uraian-pokok-permasalahan">
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px">
                            <h3>II.</h3>
                        </td>
                        <td style="width:455px; text-align: left;">
                            <h3>URAIAN SINGKAT POKOK MASALAH DAN LATAR BELAKANGNYA</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-2 uraian-pokok-permasalahan" id="table-dashgen-all" style="width:100%">
                <tbody>
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:455px; text-align:justify;"><span><?= $dp['uraian_pokok_permasalahan']; ?></span></td>
                    </tr>
                </tbody>
            </table>
        </span>
        <br>
        <span class="row mb-5 tempat-konsultasi">
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px">
                            <h3>III.</h3>
                        </td>
                        <td style="width:455px; text-align: justify;">
                            <h3>PELAKSANAAN KONSULTASI HUKUM<br>(TEMPAT/TANGGAL/BULAN/TAHUN)</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-2 tempat-konsultasi" id="table-dashgen-all" style="width:100%">
                <tbody>
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:455px; text-align:justify;"><span><?= $dp['tempat_konsultasi']; ?>,
                                <?php
                                $tanggal_konsultasi = strtotime($dp['waktu_konsultasi']);
                                $day = date('d', $tanggal_konsultasi);
                                $month = date('m', $tanggal_konsultasi);
                                $year = date('Y', $tanggal_konsultasi);
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
                                ?></span></td>
                    </tr>
                </tbody>
            </table>
        </span>
        <br pagebreak="true" />
        <br>
        <span class="row mb-5 nasihat-yuridis">
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px">
                            <h3>IV.</h3>
                        </td>
                        <td style="width:455px; text-align: left;">
                            <h3>NASIHAT YANG DIBERIKAN KONSULTAN TERMASUK ASPEK YURIDISNYA</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-2 nasihat-yuridis" id="table-dashgen-all" style="width:100%">
                <tbody>
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:455px; text-align:justify;"><?= $dp['nasihat_yuridis']; ?></td>
                    </tr>
                </tbody>
            </table>
        </span>
        <br>
        <span class="row mb-5 hasil-akhir-konsultasi">
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px">
                            <h3>V.</h3>
                        </td>
                        <td style="width:455px; text-align: left;">
                            <h3>HASIL AKHIR KONSULTASI</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-2 hasil-akhir-konsultasi" id="table-dashgen-all" style="width:100%">
                <tbody>
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:455px; text-align:justify;"><?= $dp['hasil_akhir_konsultasi']; ?></td>
                    </tr>
                </tbody>
            </table>
        </span>
        <br>
        <span class="row mb-5 kesan-konsultan">
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px">
                            <h3>VI.</h3>
                        </td>
                        <td style="width:455px; text-align: left;">
                            <h3>KESAN KONSULTAN ATAS TINGKAT PENGETAHUAN/ KESADARAN HUKUM PEMOHON</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-2 kesan-konsultan" id="table-dashgen-all" style="width:100%">
                <tbody>
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:455px; text-align:justify;"><?= $dp['kesan_konsultan']; ?></td>
                    </tr>
                </tbody>
            </table>
        </span>
        <br pagebreak="true" />
        <br>
        <span class="row mb-5 pemohon-klien">
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px">
                            <h3>VII.</h3>
                        </td>
                        <td style="width:455px; text-align: left;">
                            <h3>PEMOHON/KLIEN</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-2 kesan-konsultan" id="table-dashgen-all" style="width:100%">
                <tbody>
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:170px">Nama</td>
                        <td style="width:15px">:</td>
                        <td style="width:270px"><?= $data_penanya['nama']; ?></td>
                    </tr>
                    <!-- <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> -->
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:170px; vertical-align:middle;">
                            <div style="font-size:23pt">&nbsp;</div>
                            Tanda Tangan
                        </td>
                        <td style="width:15px; vertical-align:middle;">
                            <div style="font-size:23pt">&nbsp;</div>
                            :
                        </td>
                        <td style="width:270px">
                            <!-- ttd -->
                            <img style="width:100px; height:70px;" src="/ac201fd270c3b96beab24f2829780ab2/<?= $namaimagenya_penanya; ?>.png" alt="lol">
                            <!-- end ttd -->
                        </td>
                    </tr>
                </tbody>
            </table>
            <!-- <div style="font-size:23pt">&nbsp;</div> -->
        </span>
        <br>
        <span class="row mb-5 pemohon-klien">
            <table>
                <tbody>
                    <tr>
                        <td style="width:40px">
                            <h3>VIII.</h3>
                        </td>
                        <td style="width:455px; text-align: left;">
                            <h3>KONSULTAN</h3>
                        </td>
                    </tr>
                    <tr>
                        <td></td>
                    </tr>
                </tbody>
            </table>
            <table class="mt-2 kesan-konsultan" id="table-dashgen-all" style="width:100%">
                <tbody>
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:170px">Nama</td>
                        <td style="width:15px">:</td>
                        <td style="width:270px"><?= $data_penjawab['nama']; ?></td>
                    </tr>
                    <!-- <tr>
                        <td></td>
                        <td></td>
                        <td></td>
                        <td></td>
                    </tr> -->
                    <tr>
                        <td style="width:40px"></td>
                        <td style="width:170px; vertical-align:middle;">
                            <div style="font-size:23pt">&nbsp;</div>
                            Tanda Tangan
                        </td>
                        <td style="width:15px; vertical-align:middle;">
                            <div style="font-size:23pt">&nbsp;</div>
                            :
                        </td>
                        <td style="width:270px">
                            <!-- ttd -->
                            <img style="width:100px; height:70px;" src="/ac201fd270c3b96beab24f2829780ab2/<?= $namaimagenya_penjawab; ?>.png" alt="lol">
                            <!-- end ttd -->
                        </td>
                    </tr>
                </tbody>
            </table>
        </span>
        <br>
        <span class="row mb-5 pemohon-klien">
            <div style="font-size:23pt">&nbsp;</div>
            <table class="mt-2 kesan-konsultan" id="table-dashgen-all" style="width:100%">
                <tbody>
                    <tr>
                        <td style="width:270px"></td>
                        <td style="width:185px">Medan,
                            <?php
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
                            ?></td>
                    </tr>
                    <tr>
                        <td style="width:270px"></td>
                        <td style="width:185px; font-weight:bold;">Mengetahui</td>
                    </tr>
                    <div style="font-size:10pt">&nbsp;</div>
                    <tr>
                        <td style="width:270px"></td>
                        <td style="width:80px;">Nama</td>
                        <td style="width:15px;">:</td>
                        <td style="width:90px;">Jonson Siagian</td>
                    </tr>
                    <br>
                    <tr>
                        <td style="width:270px"></td>
                        <td style="width:80px; vertical-align:middle;">
                            <div style="font-size:10pt">&nbsp;</div>
                            Tanda Tangan
                        </td>
                        <td style="width:15px; vertical-align:middle;">
                            <div style="font-size:10pt">&nbsp;</div>
                            :
                        </td>
                        <td style="width:90px;">
                            <img style="width:100px; height:70px;" src="/ac201fd270c3b96beab24f2829780ab2/<?= $namaimagenya_pimpinan; ?>.png" alt="lol">
                        </td>
                    </tr>
                </tbody>
            </table>
        </span>
    </span>


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