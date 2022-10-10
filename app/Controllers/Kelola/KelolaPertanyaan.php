<?php

namespace App\Controllers\Kelola;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

class KelolaPertanyaan extends BaseController
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

        if ($id_akses == "super") {
            $all_pertanyaan = $this->pertanyaanModel->get_all_pertanyaan_kasus();
            $data = [
                'id_akses' => $id_akses,
                'all_pertanyaan' => $all_pertanyaan,
                'data_user' => $data_user
            ];
            return view('kelola/pertanyaan/kelola_pertanyaan_admin', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function hapus($id_pertanyaan)
    {
        $this->pertanyaanModel->delete($id_pertanyaan);
        return redirect()->to('/kelpert');
    }
}
