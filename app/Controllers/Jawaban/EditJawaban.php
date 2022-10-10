<?php

namespace App\Controllers\Jawaban;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

class EditJawaban extends BaseController
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

    public function index($id_pertanyaan)
    {
        $id_akses = $this->session->id_akses;
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $all_kasus = $this->kasusModel->get_kasus();
        $detail_pertanyaan = $this->pertanyaanModel->get_detail_pertanyaan($id_pertanyaan);
        $data_penjawab = $this->pertanyaanModel->get_nama_penyuluh($id_pertanyaan);
        if ($data_penjawab['id_akses'] == 'super') {
            $nama_penjawab = "Super Admin";
        } else {
            $nama_penjawab = $data_penjawab['nama'];
        }
        if ($id_akses == 'luhkum') {
            $data_penyuluh = $this->userModel->get_detail_user($email);
        } else {
            $data_penyuluh = null;
        }
        $data = [
            'id_akses' => $this->session->id_akses,
            'email' => $email,
            'dp' => $detail_pertanyaan,
            'all_kasus' => $all_kasus,
            'data_penyuluh' => $data_penyuluh,
            'nama_penjawab' => $nama_penjawab,
            'data_penjawab' => $data_penjawab,
            'data_user' => $data_user
        ];
        return view('jawaban/edit_jawaban', $data);
    }

    public function edit_jawaban()
    {
        $id_akses = $this->session->id_akses;
        $id_pertanyaan = $this->request->getVar('id-pertanyaan');
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);

        // TTD
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
        imagepng($im, $fileName);
        // END TTD

        if ($id_akses == 'super' || $id_akses == 'luhkum') {
            $this->pertanyaanModel->save([
                'id_pertanyaan' => $id_pertanyaan,
                'status_pertanyaan' => 1,
                'tempat_konsultasi' => $this->request->getVar('tempat-pelaksanaan-konsultasi'),
                'waktu_konsultasi' => $this->request->getVar('waktu-pelaksanaan-konsultasi'),
                'nasihat_yuridis' => $this->request->getVar('nasihat-yuridis'),
                'hasil_akhir_konsultasi' => $this->request->getVar('hasil-akhir-konsultasi'),
                'kesan_konsultan' => $this->request->getVar('kesan-konsultan'),
                'email_penjawab' => $email,
                'signature_penjawab' => $img_awal,
                'jabatan_acc' => $this->request->getVar('jabatan-acc'),
                'acc_pimpinan' => null,
                'email_pimpinan' => null,
                'keterangan_pimpinan' => null,
                'signature_pimpinan' => null
            ]);

            $id_akses = $this->session->id_akses;
            $email = $this->session->email;
            $all_kasus = $this->kasusModel->get_kasus();
            $detail_pertanyaan = $this->pertanyaanModel->get_detail_pertanyaan($id_pertanyaan);
            $data_penjawab = $this->pertanyaanModel->get_nama_penyuluh($id_pertanyaan);

            // ttd
            $img = str_replace('data:image/png;base64,', '', $detail_pertanyaan['signature_penjawab']);
            $img = str_replace(' ', '+', $img);
            $imgData = base64_decode($img);
            $namaimagenya = md5($imgData);
            // end ttd

            if ($data_penjawab['id_akses'] == 'super') {
                $nama_penjawab = "Super Admin";
            } else {
                $nama_penjawab = $data_penjawab['nama'];
            }
            if ($id_akses == 'luhkum') {
                $data_penyuluh = $this->userModel->get_detail_user($email);
            } else {
                $data_penyuluh = null;
            }
            $data = [
                'id_akses' => $this->session->id_akses,
                'email' => $email,
                'dp' => $detail_pertanyaan,
                'all_kasus' => $all_kasus,
                'data_penyuluh' => $data_penyuluh,
                'nama_penjawab' => $nama_penjawab,
                'data_penjawab' => $data_penjawab,
                'data_user' => $data_user,
                'namaimagenya' => $namaimagenya
            ];
            return view('pertanyaan/detail_pertanyaan', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Membuat Jawaban');
            window.location.href='/';
            </script>";
        }
    }

    public function hapus_jawaban()
    {
        $id_akses = $this->session->id_akses;
        $id_pertanyaan = $this->request->getVar('id-pertanyaan');

        if ($id_akses == 'super' || $id_akses == 'luhkum') {
            $this->pertanyaanModel->save([
                'id_pertanyaan' => $id_pertanyaan,
                'status_pertanyaan' => 0,
                'tempat_konsultasi' => null,
                'waktu_konsultasi' => null,
                'nasihat_yuridis' => null,
                'hasil_akhir_konsultasi' => null,
                'kesan_konsultan' => null,
                'email_penjawab' => null,
                'signature_penjawab' => null,
                'jabatan_penjawab' => null,
                'acc_pimpinan' => null,
                'email_pimpinan' => null,
                'keterangan_pimpinan' => null,
                'signature_pimpinan' => null
            ]);

            echo "<script>
            alert('Jawaban Berhasil Dihapus');
            window.location.href='/';
            </script>";
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Menghapus Jawaban');
            window.location.href='/';
            </script>";
        }
    }
}
