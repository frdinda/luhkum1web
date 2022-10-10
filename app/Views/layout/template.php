<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Konsultasi Hukum &amp; Konsultasi Hukum Kantor Wilayah Kementerian Hukum dan HAM Sumatera Utara">
    <meta name="author" content="HUMAS_KUSUMA">
    <meta name="keywords" content="kemenkumham, hukum, konsultasi, penyuluhan, bantuan, pertanyaan, jawaban, masalah, warisan, notaris, hak asuh, harta, anak, adminkit, bootstrap, bootstrap 5, admin, dashboard, template, responsive, css, sass, html, theme, front-end, ui kit, web">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link rel="shortcut icon" href="img/icons/logo_fix.ico" />
    <link href="/css/app.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;600&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <link href="/assets/extra-libs/datatables.net-bs4/css/dataTables.bootstrap4.css" rel="stylesheet">
    <link rel="canonical" href="https://demo-basic.adminkit.io/" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-+0n0xVW2eSR5OomGNYDnhzAbDsOXxcvSN1TPprVMTNDbiYZCxYbOOl7+AMvyTG2x" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.datatables.net/1.11.3/css/dataTables.bootstrap5.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
    <title>Konsultasi Hukum</title>
</head>

<body>
    <div class="wrapper">
        <nav id="sidebar" class="sidebar js-sidebar">
            <div class="sidebar-content js-simplebar">
                <a class="sidebar-brand" href="<?= base_url("/konsul"); ?>">
                    <span class="align-middle">KONSULTASI HUKUM</span>
                </a>
                <!-- random -->

                <ul class="sidebar-nav">
                    <!-- beranda butuh if untuk ngebedain href dari tiap user -->
                    <?php if (isset($id_akses)) { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/konsul"); ?>">
                                <i class="align-middle" data-feather="home"></i> <span class="align-middle">Beranda</span>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- khusus untuk publik -->
                    <?php if ($id_akses == null || $id_akses == 'masyarakat' || $id_akses == 'super') { ?>
                        <li class="sidebar-header">
                            Konsultasi Hukum
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/tanya"); ?>">
                                <i class="align-middle" data-feather="help-circle"></i> <span class="align-middle">Buat Pertanyaan</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/konsul"); ?>">
                                <i class="align-middle" data-feather="layers"></i> <span class="align-middle">List Pertanyaan</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($id_akses == null) { ?>
                        <li class="sidebar-header">
                            Artikel, Podcast, dan Video
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/listartikel"); ?>">
                                <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">List Artikel</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/listpodcast"); ?>">
                                <i class="align-middle" data-feather="tv"></i> <span class="align-middle">List Podcast</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/listvideo"); ?>">
                                <i class="align-middle" data-feather="video"></i> <span class="align-middle">List Video</span>
                            </a>
                        </li>
                        <li class="sidebar-header">
                            Login dan Registrasi
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/login"); ?>">
                                <i class="align-middle" data-feather="log-in"></i> <span class="align-middle">Login</span>
                            </a>
                        </li>

                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/regis"); ?>">
                                <i class="align-middle" data-feather="user"></i> <span class="align-middle">Sign Up</span>
                            </a>
                        </li>
                    <?php } ?>
                    <!-- end khusus untuk publik -->

                    <!--ini khusus untuk masyarakat -->
                    <?php if ($id_akses == 'masyarakat') { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/dpsy"); ?>">
                                <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Daftar Pertanyaan User</span>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- ini untuk penyuluh, pimpinan, dan super admin -->
                    <?php if ($id_akses == 'luhkum' || $id_akses == 'pimti' || $id_akses == 'super' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv') { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/dashgen"); ?>">
                                <i class="align-middle" data-feather="monitor"></i> <span class="align-middle">Dashboard General</span>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- ini khusus untuk penyuluh -->
                    <?php if ($id_akses == 'luhkum') { ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/dashluh"); ?>">
                                <i class="align-middle" data-feather="layers"></i> <span class="align-middle">Dashboard User</span>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- ini untuk penyuluh, pimpinan, dan super admin lagi -->
                    <?php if ($id_akses == 'luhkum' || $id_akses == 'pimti' || $id_akses == 'super' || $id_akses == 'kasub' || $id_akses == 'kabid' || $id_akses == 'kadiv') { ?>
                        <li class="sidebar-header">
                            Artikel, Podcast, dan Video
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/artluh"); ?>">
                                <i class="align-middle" data-feather="bookmark"></i> <span class="align-middle">Artikel</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/podluh"); ?>">
                                <i class="align-middle" data-feather="tv"></i> <span class="align-middle">Podcast</span>
                            </a>
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/vidluh"); ?>">
                                <i class="align-middle" data-feather="video"></i> <span class="align-middle">Video</span>
                            </a>
                        </li>
                    <?php } ?>

                    <?php if ($id_akses == 'masyarakat' || $id_akses == 'luhkum') { ?>
                        <li class="sidebar-header">
                            Data User
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/edu"); ?>">
                                <i class="align-middle" data-feather="edit"></i> <span class="align-middle">Edit Data Diri</span>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- ini khusus superadmin -->
                    <?php if ($id_akses == 'super') { ?>
                        <li class="sidebar-header">
                            Kelola Super Admin
                        </li>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/kelus"); ?>">
                                <i class="align-middle" data-feather="users"></i> <span class="align-middle">Kelola User</span>
                            </a>
                        </li>

                        <!-- ini khusus superadmin -->
                        <!-- <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/kelaks"); ?>">
                                <i class="align-middle" data-feather="user-plus"></i> <span class="align-middle">Kelola Jenis Akses</span>
                            </a>
                        </li> -->

                        <!-- ini khusus superadmin -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/kelkas"); ?>">
                                <i class="align-middle" data-feather="file"></i> <span class="align-middle">Kelola Jenis Kasus</span>
                            </a>
                        </li>

                        <!-- ini khusus superadmin -->
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/kelpert"); ?>">
                                <i class="align-middle" data-feather="folder"></i> <span class="align-middle">Kelola Pertanyaan dan Jawaban</span>
                            </a>
                        </li>
                    <?php } ?>

                    <!-- sign out -->
                    <?php if (isset($id_akses)) {
                        if ($id_akses == 'super') { ?>
                            <li class="sidebar-header">
                                Logout
                            </li>
                        <?php } ?>
                        <li class="sidebar-item">
                            <a class="sidebar-link" href="<?= base_url("/outkum"); ?>">
                                <i class="align-middle" data-feather="power"></i> <span class="align-middle">Logout</span>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
                <!-- end of random -->
        </nav>

        <div class="main">
            <nav class="navbar navbar-expand navbar-light navbar-bg">
                <a class="sidebar-toggle js-sidebar-toggle">
                    <i class="hamburger align-self-center"></i>
                </a>

                <div class="navbar-collapse collapse">
                    <?= $this->rendersection('title'); ?>
                </div>

                <div class="navbar-collapse collapse">
                    <ul class="navbar-nav navbar-align">
                        <li class="nav-item dropdown">
                            <?php if ($id_akses == 'super') { ?>
                                <img src="/img/avatars/1 (2).png" class="avatar img-fluid rounded me-1" alt="user" /> <span class="text-dark">
                                    <?= $data_user['jenis_akses']; ?>
                                </span>
                            <?php } else if (isset($id_akses)) { ?>
                                <img src="/img/avatars/1 (2).png" class="avatar img-fluid rounded me-1" alt="user" /> <span class="text-dark">
                                    <?= $data_user['nama']; ?>
                                </span>
                            <?php } else { ?>
                                <a class="" href="<?= base_url("/login"); ?>">
                                    <img src="/img/avatars/1 (2).png" class="avatar img-fluid rounded me-1" alt="user" />
                                </a>
                            <?php } ?>
                        </li>
                    </ul>
                </div>
            </nav>

            <main class="content">
                <div class="container-fluid p-0">
                    <?= $this->rendersection('content'); ?>
                </div>
            </main>
        </div>

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