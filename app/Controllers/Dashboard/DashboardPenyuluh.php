<?php

namespace App\Controllers\Dashboard;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

class DashboardPenyuluh extends BaseController
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
        $data_penjawab_all_spesifik = $this->pertanyaanModel->get_nama_penyuluh_all_spesifik($email);
        $jumlah_pertanyaan = count($all_pertanyaan);
        $data_penjawab_all_spesifik_terjawab = $this->pertanyaanModel->get_nama_penyuluh_all_spesifik_terjawab($email);
        $jumlah_pertanyaan_terjawab = count($data_penjawab_all_spesifik_terjawab);
        $all_kasus = $this->kasusModel->get_kasus();
        $data = [
            'all_pertanyaan' => $all_pertanyaan,
            'all_pertanyaan_spesifik' => $data_penjawab_all_spesifik,
            'id_akses' => $this->session->id_akses,
            'jumlah_pertanyaan' => $jumlah_pertanyaan,
            'jumlah_pertanyaan_terjawab' => $jumlah_pertanyaan_terjawab,
            'all_kasus' => $all_kasus,
            'email' => $email,
            'data_user' => $data_user
        ];
        return view('dashboard/dashboard_penyuluh', $data);
    }
}
