<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// $routes->get('/', 'Beranda\Publik::index');
$routes->get('/', 'WebPage\Home::index');

$routes->get('/konsul', 'Beranda\Publik::index');
$routes->get('/listartikel', 'Beranda\Publik::listartikel');
$routes->get('/listpodcast', 'Beranda\Publik::listpodcast');
$routes->get('/listvideo', 'Beranda\Publik::listvideo');

$routes->post('/publik', 'Beranda\Publik::filter_jenis_kasus');
$routes->get('/dpsy', 'Pertanyaan\DaftarPertanyaanUser::index');
$routes->get('/dashgen', 'Dashboard\DashboardGeneral::index');
$routes->get('/dashluh', 'Dashboard\DashboardPenyuluh::index');


// REGISTRASI
$routes->get('/regis', 'Registrasi\Registrasi::index');
// email verifikasi
$routes->get('/33b3/(:any)', 'Registrasi\Registrasi::verify_registrasi/$1');
$routes->post('/reg3is', 'Registrasi\Registrasi::registrasi');

// USER UPDATE
$routes->get('/edu', 'EditDiri\EdUser::index');
$routes->post('/user/save_user', 'EditDiri\EdUser::update');

// LOGIN
$routes->get('/login', 'Login\Login::index');
$routes->post('/proslogin', 'Login\Login::login');
$routes->get('/outkum', 'Login\Login::logout');

// BUAT PERTANYAAN
$routes->get('/tanya', 'Pertanyaan\BuatPertanyaan::index');
$routes->post('/tanya/ta33nya', 'Pertanyaan\BuatPertanyaan::save_pertanyaan');
$routes->post('/tanya/ta33nyaa', 'Pertanyaan\BuatPertanyaan::save_pertanyaan');

// DETAIL PERTANYAAN
$routes->get('/detail-tanya/(:any)', 'Pertanyaan\DetailPertanyaan::index/$1');
// edit jenis kasus
$routes->post('/detail-tanya/edit_kasus', 'Pertanyaan\DetailPertanyaan::edit_jenis_kasus');

// ACC
$routes->get('/jawab/acc/(:any)', 'Acc\AccPage::index/$1');
$routes->get('/jawab/editacc/(:any)', 'Acc\AccPage::edit/$1');
$routes->post('/acc/save/', 'Acc\AccPage::save_acc');
$routes->get('/acc/detail/(:any)', 'Acc\AccPage::detail/$1');

// JAWABAN
$routes->post('/jawab/save_jawaban', 'Pertanyaan\DetailPertanyaan::save_jawaban');
$routes->get('/jawab/edit/(:any)', 'Jawaban\EditJawaban::index/$1');
$routes->post('/jawab/edit_jawaban', 'Jawaban\EditJawaban::edit_jawaban');
$routes->post('/jawab/hapus_jawaban', 'Jawaban\EditJawaban::hapus_jawaban');
$routes->get('/jawab/(:any)', 'Pertanyaan\DetailPertanyaan::index/$1');
$routes->post('/jawab/save_feedback', 'Pertanyaan\DetailPertanyaan::feedback');

// KELOLA USER
$routes->get('/detu/(:any)', 'Kelola\KelolaUser::detailUser/$1');
$routes->get('/adminedu/(:any)', 'Kelola\KelolaUser::editUser/$1');
$routes->get('/kelus', 'Kelola\KelolaUser::index');
$routes->get('/tmbuser', 'Kelola\KelolaUser::tambahUser');
$routes->post('/tmbuser/save', 'Kelola\KelolaUser::saveTambahUser');
$routes->delete('/edit_user/hapus/(:any)', 'Kelola\KelolaUser::hapus/$1');

// KELOLA AKSES BELUM
$routes->get('/kelaks', 'Kelola\KelolaAkses::index');
$routes->get('/tmbakses', 'Kelola\KelolaAkses::tambahAkses');
$routes->get('/adminedaks', 'Kelola\KelolaAkses::editAkses');

// KELOLA KASUS
$routes->get('/kelkas', 'Kelola\KelolaKasus::index');
$routes->get('/tmbkasus', 'Kelola\KelolaKasus::tambahKasus');
$routes->post('/tmbkasus/save', 'Kelola\KelolaKasus::saveTambahKasus');
$routes->get('/adminedkas/(:any)', 'Kelola\KelolaKasus::editKasus/$1');
$routes->delete('/edit_kasus/hapus/(:any)', 'Kelola\KelolaKasus::hapus/$1');
$routes->post('/edit_kasus/save', 'Kelola\KelolaKasus::saveEditKasus');

// KELOLA PERTANYAAN
$routes->get('/kelpert', 'Kelola\KelolaPertanyaan::index');
$routes->delete('/edit_pert/hapus/(:any)', 'Kelola\KelolaPertanyaan::hapus/$1');

// PRINT
$routes->get('/printpdf/(:any)', 'PrintPdf\Home::index/$1');

// ARTIKEL
$routes->get('/artluh', 'Artikel\Artikel::index');
$routes->get('/artikel/tambah', 'Artikel\Artikel::tambahArtikel');
$routes->post('/artikel/save_artikel', 'Artikel\Artikel::savetambahArtikel');
$routes->get('/artikel/detail/(:any)', 'Artikel\Artikel::detailArtikel/$1');
$routes->get('/artikel/edit/(:any)', 'Artikel\Artikel::editArtikel/$1');
$routes->post('/artikel/save_edit_artikel', 'Artikel\Artikel::saveeditArtikel');
$routes->get('/artikel/hapus/(:any)', 'Artikel\Artikel::hapusArtikel/$1');

// PODCAST
$routes->get('/podluh', 'Podcast\Podcast::index');
$routes->get('/podcast/tambah', 'Podcast\Podcast::tambahPodcast');
$routes->post('/podcast/save_podcast', 'Podcast\Podcast::savetambahPodcast');
$routes->get('/podcast/detail/(:any)', 'Podcast\Podcast::detailPodcast/$1');
$routes->get('/podcast/edit/(:any)', 'Podcast\Podcast::editPodcast/$1');
$routes->post('/podcast/save_edit_podcast', 'Podcast\Podcast::saveeditPodcast');
$routes->get('/podcast/hapus/(:any)', 'Podcast\Podcast::hapusPodcast/$1');


// VIDEO PENYULUHAN
$routes->get('/vidluh', 'Video\Video::index');
$routes->get('/video/tambah', 'Video\Video::tambahVideo');
$routes->post('/video/save_video', 'Video\Video::savetambahVideo');
$routes->get('/video/detail/(:any)', 'Video\Video::detailVideo/$1');
$routes->get('/video/edit/(:any)', 'Video\Video::editVideo/$1');
$routes->post('/video/save_edit_video', 'Video\Video::saveeditVideo');
$routes->get('/video/hapus/(:any)', 'Video\Video::hapusVideo/$1');


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
