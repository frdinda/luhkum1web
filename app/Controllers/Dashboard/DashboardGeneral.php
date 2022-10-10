<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

class DashboardGeneral extends BaseController
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
        $all_pertanyaan = $this->pertanyaanModel->get_pertanyaan();
        $jumlah_pertanyaan = count($all_pertanyaan);
        $all_pertanyaan_terjawab = $this->pertanyaanModel->get_pertanyaan_terjawab();
        $jumlah_pertanyaan_terjawab = count($all_pertanyaan_terjawab);
        $all_kasus = $this->kasusModel->get_kasus();
        $data_penjawab_all = $this->pertanyaanModel->get_nama_penyuluh_all();
        $data = [
            'all_pertanyaan' => $data_penjawab_all,
            'id_akses' => $this->session->id_akses,
            'jumlah_pertanyaan' => $jumlah_pertanyaan,
            'jumlah_pertanyaan_terjawab' => $jumlah_pertanyaan_terjawab,
            'all_kasus' => $all_kasus,
            'email' => $email,
            'data_user' => $data_user
        ];

        if (isset($id_akses) && $id_akses != 'masyarakat') {
            return view('dashboard/dashboard_general', $data);
        }
    }
}
