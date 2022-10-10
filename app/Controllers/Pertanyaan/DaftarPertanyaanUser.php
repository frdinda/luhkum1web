<?php

namespace App\Controllers\Pertanyaan;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

class DaftarPertanyaanUser extends BaseController
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
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $all_kasus = $this->kasusModel->get_kasus();
        $all_pertanyaan = $this->pertanyaanModel->get_pertanyaan_penanya($email);
        // dd($all_pertanyaan);
        $data = [
            'id_akses' => $id_akses,
            'all_kasus' => $all_kasus,
            'email' => $email,
            'all_pertanyaan' => $all_pertanyaan,
            'data_user' => $data_user
        ];
        if ($id_akses == 'masyarakat') {
            return view('pertanyaan/daftar_pertanyaan_user', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }
}
