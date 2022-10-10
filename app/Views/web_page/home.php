<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">

    <title>Penyuluhan Hukum</title>
    <meta content="" name="description">
    <meta content="" name="keywords">

    <!-- Favicons -->
    <link rel="shortcut icon" href="img/icons/logo_fix.ico" />

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="assets/vendor/animate.css/animate.min.css" rel="stylesheet">
    <link href="assets/vendor/aos/aos.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="assets/vendor/bootstrap-icons/bootstrap-icons.css" rel="stylesheet">
    <link href="assets/vendor/boxicons/css/boxicons.min.css" rel="stylesheet">
    <link href="assets/vendor/remixicon/remixicon.css" rel="stylesheet">
    <link href="assets/vendor/swiper/swiper-bundle.min.css" rel="stylesheet">

    <!-- Template Main CSS File -->
    <link href="assets/css/style.css" rel="stylesheet">

    <!-- =======================================================
  * Template Name: Mentor - v4.7.0
  * Template URL: https://bootstrapmade.com/mentor-free-education-bootstrap-theme/
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body>

    <!-- ======= Header ======= -->
    <header id="header" class="fixed-top">
        <div class="container d-flex align-items-center">

            <h1 class="logo me-auto"><a href="<?= base_url('/'); ?>">PENYULUHAN HUKUM</a></h1>
            <!-- Uncomment below if you prefer to use an image logo -->
            <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt="" class="img-fluid"></a>-->

            <nav id="navbar" class="navbar order-last order-lg-0">
                <ul>
                    <li><a class="active" href="<?= base_url('/'); ?>">Home</a></li>
                    <li><a href="<?= base_url('/konsul'); ?>">Konsultasi Hukum</a></li>
                    <!-- <li><a href="courses.html">Podcast</a></li> -->
                </ul>
                <i class="bi bi-list mobile-nav-toggle"></i>
            </nav><!-- .navbar -->

            <a href="<?= base_url('/login'); ?>" class="get-started-btn">Login</a>

        </div>
    </header><!-- End Header -->

    <!-- ======= Hero Section ======= -->
    <section id="hero" class="d-flex justify-content-center align-items-center">
        <div class="container position-relative" data-aos="zoom-in" data-aos-delay="100">
            <h1>Penyuluhan Hukum<br>Jadi Mudah</h1>
            <h2>Lewat Penyuluhan Hukum Online milik <br> Kantor Wilayah Kementerian Hukum dan HAM Sumatera Utara</h2>
            <a href="<?= base_url('/regis'); ?>" class="btn-get-started" target="_blank">Registrasi</a>
        </div>
    </section><!-- End Hero -->

    <main id="main">

        <!-- ======= Counts Section ======= -->
        <section id="counts" class="counts section-bg">
            <div class="container">

                <div class="row counters">

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_pertanyaan; ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Konsultasi Hukum</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_luhkum; ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Penyuluh Hukum</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_artikel; ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Artikel</p>
                    </div>

                    <div class="col-lg-3 col-6 text-center">
                        <span data-purecounter-start="0" data-purecounter-end="<?= $jumlah_pod_vid; ?>" data-purecounter-duration="1" class="purecounter"></span>
                        <p>Podcast dan Video</p>
                    </div>

                </div>

            </div>
        </section><!-- End Counts Section -->

        <!-- ======= Konsultasi Hukum Section ======= -->
        <section id="why-us" class="why-us">
            <div class="container" data-aos="fade-up">

                <div class="row">
                    <div class="col-lg-4 d-flex align-items-stretch">
                        <div class="content">
                            <h3>Konsultasi Hukum</h3>
                            <p>
                                Ada pertanyaan terkait hukum? Tanyakan langsung kepada para Penyuluh Hukum kami secara gratis.
                            </p>
                            <div class="text-center">
                                <a href="<?= base_url('/konsul'); ?>" class="more-btn" target="_blank">Lebih Lanjut <i class="bx bx-chevron-right"></i></a>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                        <div class="icon-boxes d-flex flex-column justify-content-center">
                            <div class="row">
                                <?php foreach ($pertanyaan_terakhir as $p) : ?>
                                    <div class="col-xl-4 d-flex align-items-stretch">
                                        <a href="<?= base_url('/detail-tanya/' . $p['id_pertanyaan']); ?>" class="more-btn" target="_blank">
                                            <div class="icon-box mt-4 mt-xl-0">
                                                <!-- <i class="bx bx-receipt"></i> -->
                                                <h4><?= $p['judul_pertanyaan']; ?></h4>
                                                <p><?php $limit_uraian = strip_tags($p['uraian_pokok_permasalahan']);
                                                    if (strlen($limit_uraian) > 140) {
                                                        $stringCut = substr($limit_uraian, 0, 140);
                                                        $endPoint = strrpos($stringCut, ' ');

                                                        $limit_uraian = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                        $limit_uraian .= '...';
                                                    }
                                                    echo $limit_uraian; ?></p>
                                                <a href="<?= base_url('/detail-tanya/' . $p['id_pertanyaan']); ?>" class="more-btn" target="_blank">Baca Selengkapnya</a>
                                            </div>
                                        </a>
                                    </div>

                                <?php endforeach; ?>
                            </div>
                        </div><!-- End .content-->
                    </div>
                </div>

            </div>
        </section><!-- End Konsultasi Hukum Section -->

        <!-- ======= Podcast Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Upload</h2>
                    <p><a href="<?= base_url('/listpodcast'); ?>">Podcast</a></p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <?php foreach ($podcast_terakhir as $p) : ?>
                        <div class="col-lg-3 col-md-6 mb-2 d-flex align-items-stretch">
                            <a href="<?= $p['link_podcast']; ?>" class="more-btn" target="_blank">
                                <div class="course-item">
                                    <img src="http://img.youtube.com/vi/<?= $p['thumbnail_podcast']; ?>/mqdefault.jpg" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <div class="d-flex justify-content-between align-items-center mb-3">
                                            <?php $time = date('Y-m-d H:i:s');
                                            if (strtotime($p['tanggal_podcast']) >= strtotime($time) || strtotime($p['tanggal_podcast']) == strtotime($time)) { ?>
                                                <h4 style="background-color:red;">Coming Soon / Live</h4>
                                            <?php } else { ?>
                                                <h4 style="background-color:green;">Recorded</h4>
                                            <?php } ?>
                                        </div>
                                        <h3><a href="course-details.html"><?= $p['judul_podcast']; ?></a></h3>
                                        <p><?php $limit_uraian = strip_tags($p['caption_podcast']);
                                            if (strlen($limit_uraian) > 140) {
                                                $stringCut = substr($limit_uraian, 0, 140);
                                                $endPoint = strrpos($stringCut, ' ');

                                                $limit_uraian = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $limit_uraian .= '...';
                                            }
                                            echo $limit_uraian; ?></p>
                                        <a href="<?= $p['link_podcast']; ?>" class="more-btn" target="_blank">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </a>
                        </div> <!-- End Course Item-->
                    <?php endforeach; ?>

                </div>

            </div>
        </section><!-- End Podcast Section -->

        <!-- ======= Video Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Upload</h2>
                    <p><a href="<?= base_url('/listvideo'); ?>">Video</a></p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <?php foreach ($video_terakhir as $p) : ?>
                        <div class="col-lg-3 col-md-6 mb-2 d-flex align-items-stretch">
                            <a href="<?= $p['link_video']; ?>" class="more-btn" target="_blank">
                                <div class="course-item">
                                    <img src="http://img.youtube.com/vi/<?= $p['thumbnail_video']; ?>/mqdefault.jpg" class="img-fluid" alt="...">
                                    <div class="course-content">
                                        <h3><a href="course-details.html"><?= $p['judul_video']; ?></a></h3>
                                        <p><?php $limit_uraian = strip_tags($p['caption_video']);
                                            if (strlen($limit_uraian) > 140) {
                                                $stringCut = substr($limit_uraian, 0, 140);
                                                $endPoint = strrpos($stringCut, ' ');

                                                $limit_uraian = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                $limit_uraian .= '...';
                                            }
                                            echo $limit_uraian; ?></p>
                                        <a href="<?= $p['link_video']; ?>" class="more-btn" target="_blank">Lihat Selengkapnya</a>
                                    </div>
                                </div>
                            </a>
                        </div> <!-- End Course Item-->
                    <?php endforeach; ?>
                </div>

            </div>
        </section><!-- End Video Section -->

        <!-- ======= Artikel Section ======= -->
        <section id="popular-courses" class="courses">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Artikel</h2>
                    <p><a href="<?= base_url('/listartikel'); ?>">Artikel</a></p>
                </div>

                <div class="col-lg-8 d-flex align-items-stretch" data-aos="zoom-in" data-aos-delay="100">
                    <div class="icon-boxes d-flex flex-column justify-content-center">
                        <div class="row">
                            <?php foreach ($artikel_terakhir as $p) : ?>
                                <?php
                                $arr1 = explode('-', $p['tanggal_artikel']);
                                $arr2 = implode('', $arr1);
                                $code = $arr2 . '-' . $p['id_artikel'];
                                ?>
                                <a href="<?= base_url('/artikel/detail/' . $code); ?>" class="more-btn" target="_blank">
                                    <div class="col-xl-3 d-flex align-items-stretch">
                                        <div class="icon-box mt-4 mt-xl-0">
                                            <!-- <i class="bx bx-receipt"></i> -->
                                            <h4 style="color:black"><?= $p['judul_artikel']; ?></h4>
                                            <p style="color:black"><?php $limit_uraian = strip_tags($p['isi_artikel']);
                                                                    if (strlen($limit_uraian) > 140) {
                                                                        $stringCut = substr($limit_uraian, 0, 140);
                                                                        $endPoint = strrpos($stringCut, ' ');

                                                                        $limit_uraian = $endPoint ? substr($stringCut, 0, $endPoint) : substr($stringCut, 0);
                                                                        $limit_uraian .= '...';
                                                                    }
                                                                    echo $limit_uraian; ?></p>
                                            <a href="<?= base_url('/artikel/detail/' . $code); ?>" class="more-btn" target="_blank">Baca Selengkapnya</a>
                                        </div>
                                    </div>
                                </a>
                            <?php endforeach; ?>
                        </div>
                    </div><!-- End .content-->
                </div>

            </div>
        </section><!-- End Artikel Section -->

        <!-- ======= List Penyuluh Hukum Section ======= -->
        <section id="trainers" class="trainers">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Tim Penyuluh</h2>
                    <p>Para Penyuluh Hukum</p>
                </div>

                <?php foreach ($all_luhkum as $a) : ?>
                    <div class="row" data-aos="zoom-in" data-aos-delay="100">
                        <div class="col-lg-2 col-md-3 d-flex align-items-stretch">
                            <div class="member">
                                <!-- foto user -->
                                <img src="assets/img/trainers/trainer-1.jpg" class="img-fluid" alt="">
                                <div class="member-content">
                                    <h4><?= $a['nama']; ?></h4>
                                    <span><?= $a['pekerjaan']; ?></span>
                                    <div class="social">
                                        <!-- ganti iconnya jadi telepon -->
                                        <a href="https://wa.me/<?= $a['no_telp']; ?>"><i class="bi bi-phone"></i> Kontak</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>

                    </div>
        </section><!-- End List Penyuluh Hukum Section -->

        <!-- ======= Features Section ======= -->
        <section id="features" class="features">
            <div class="container" data-aos="fade-up">

                <div class="section-title">
                    <h2>Menu</h2>
                    <p>Menu</p>
                </div>

                <div class="row" data-aos="zoom-in" data-aos-delay="100">
                    <div class="col-lg-3 col-md-3">
                        <div class="icon-box">
                            <i class="ri-store-line" style="color: #ffbb2c;"></i>
                            <h3><a href="<?= base_url('/konsul'); ?>">Konsultasi Hukum</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-calendar-todo-line" style="color: #e80368;"></i>
                            <h3><a href="<?= base_url('/listartikel'); ?>">Artikel</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                            <h3><a href="<?= base_url('/listpodcast'); ?>">Podcast</a></h3>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-3 mt-4 mt-md-0">
                        <div class="icon-box">
                            <i class="ri-bar-chart-box-line" style="color: #5578ff;"></i>
                            <h3><a href="<?= base_url('/listvideo'); ?>">Video</a></h3>
                        </div>
                    </div>
                </div>

            </div>
        </section><!-- End Features Section -->

    </main><!-- End #main -->

    <!-- ======= Footer ======= -->
    <footer id="footer">
        <div class="container d-md-flex py-4">

            <div class="me-md-auto text-center text-md-start">
                <div class="copyright">
                    &copy; Copyright <strong><span>Kantor Wilayah Kementerian Hukum dan HAM Sumatera Utara</span></strong>
                </div>
            </div>
            <div class="social-links text-center text-md-right pt-3 pt-md-0">
                <a href="https://twitter.com/Kemenkumham_SUM" target="_blank" class="twitter"><i class="bx bxl-twitter"></i></a>
                <a href="https://web.facebook.com/kanwilkemenkumham.sumut" target="_blank" class="facebook"><i class="bx bxl-facebook"></i></a>
                <a href="https://www.instagram.com/kemenkumhamsumut/" class="instagram"><i class="bx bxl-instagram"></i></a>
            </div>
        </div>
    </footer><!-- End Footer -->

    <div id="preloader"></div>
    <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

    <!-- Vendor JS Files -->
    <script src="assets/vendor/purecounter/purecounter.js"></script>
    <script src="assets/vendor/aos/aos.js"></script>
    <script src="assets/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>
    <script src="assets/vendor/swiper/swiper-bundle.min.js"></script>
    <script src="assets/vendor/php-email-form/validate.js"></script>

    <!-- Template Main JS File -->
    <script src="assets/js/main.js"></script>

</body>

</html>