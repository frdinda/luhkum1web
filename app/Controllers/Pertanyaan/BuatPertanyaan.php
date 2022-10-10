<?php

namespace App\Controllers\Pertanyaan;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

use function PHPUnit\Framework\isNull;

class BuatPertanyaan extends BaseController
{
    protected $pertanyaanModel;
    protected $kasusModel;
    protected $userModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
        $this->kasusModel = new KasusModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $id_akses = $this->session->id_akses;
        $all_kasus = $this->kasusModel->get_kasus();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data = [
            'id_akses' => $this->session->id_akses,
            'all_kasus' => $all_kasus,
            'data_user' => $data_user
        ];
        if (isset($id_akses)) {
            return view('pertanyaan/buat_pertanyaan', $data);
        } else {
            echo "<script>
            alert('Registrasi untuk Buat Pertanyaan');
            window.location.href='/regis';
            </script>";
        }
    }

    public function save_pertanyaan()
    {
        $id_akses = $this->session->id_akses;
        $di_beranda = $this->request->getVar('di-beranda');
        $tanggal_hari_ini = date('Y-m-d');
        if (isset($di_beranda)) {
            $di_beranda = $di_beranda;
        } else {
            $di_beranda = '1';
        }

        $anonymous = $this->request->getVar('anonymous');
        if (isset($anonymous)) {
            $anonymous = $anonymous;
        } else {
            $anonymous = '1';
        }

        if ($id_akses == 'super' || $id_akses == 'masyarakat') {
            // $data = [
            //     'judul_pertanyaan' => $this->request->getVar('judul-pertanyaan'),
            //     'id_kasus' => $this->request->getVar('jenis-kasus'),
            //     'uraian_pokok_permasalahan' => $this->request->getVar('isi-pertanyaan'),
            //     'status_pertanyaan' => '0',
            //     'di_beranda' => $di_beranda,
            //     'anonymous' => $anonymous,
            //     'email_penanya' => $this->session->email,
            //     'tanggal_pertanyaan' => strtotime($tanggal_hari_ini)
            // ];
            // dd($data);


            // START TTD
            // $uniqe_nama = time() . rand(10, 10000);

            // $nama_arsip = $uniqe_nama . '.png';
            // $signature = $this->request->getFile('sig-canvas');
            // dd($signature);
            // $signature->move('ac201fd270c3b96beab24f2829780ab2', $nama_arsip);

            // $base64_nama = 'data:image/png;base64,' . base64_encode($uniqe_nama);
            $img_awal = $this->request->getVar('sig-dataUrl');
            $img = str_replace('data:image/png;base64,', '', $img_awal);
            $img = str_replace(' ', '+', $img);
            $imgData = base64_decode($img);
            $namaimagenya = md5($imgData);
            $im = imagecreatefromstring($imgData);
            imagesavealpha($im, true);
            $white = imagecolorallocate($im, 255, 255, 255);
            imagefill($im, 0, 0, $white);
            $fileName = "ac201fd270c3b96beab24f2829780ab2/" . $namaimagenya . ".png";
            // $fileName = strval(str_replace("\0", "", $fileName));
            imagepng($im, $fileName);

            // file_put_contents($fileName, $im);

            // dd($imgData);
            // END TTD

            $this->pertanyaanModel->insert([
                'judul_pertanyaan' => $this->request->getVar('judul-pertanyaan'),
                'id_kasus' => $this->request->getVar('jenis-kasus'),
                'uraian_pokok_permasalahan' => $this->request->getVar('isi-pertanyaan'),
                'status_pertanyaan' => '0',
                'di_beranda' => $di_beranda,
                'anonymous' => $anonymous,
                'email_penanya' => $this->session->email,
                'tanggal_pertanyaan' => $tanggal_hari_ini,
                'signature_penanya' => $img_awal
            ]);
            echo "<script>
            alert('Pertanyaan Berhasil Terinput, Notifikasi Jawaban Akan Disampaikan Melalui Email');
            window.location.href='/konsul';
            </script>";
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Membuat Pertanyaan');
            window.location.href='/';
            </script>";
        }
    }
}
