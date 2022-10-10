<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class PertanyaanModel extends Model
{
    protected $table      = 'tr_pertanyaan_jawaban';
    protected $primaryKey = 'id_pertanyaan';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_pertanyaan', 'judul_pertanyaan', 'id_kasus', 'uraian_pokok_permasalahan', 'status_pertanyaan', 'di_beranda', 'anonymous', 'email_penanya', 'tempat_konsultasi', 'waktu_konsultasi', 'nasihat_yuridis', 'hasil_akhir_konsultasi', 'kesan_konsultan', 'email_penjawab', 'feedback_masyarakat', 'tanggal_pertanyaan', 'signature_penanya', 'signature_penjawab', 'jabatan_acc', 'acc_pimpinan', 'email_pimpinan', 'keterangan_pimpinan', 'signature_pimpinan', 'tanggal_acc'];

    // protected $useTimestamps = true;
    // protected $dateFormat = 'datetime';
    // protected $createdField  = 'created_at';
    // protected $updatedField  = 'updated_at';
    // protected $deletedField  = 'deleted_at';

    // // protected $validationRules    = [];
    // // protected $validationMessages = [];
    // // protected $skipValidation     = false;

    // // protected $db;
    // // public function __construct(ConnectionInterface &$db)
    // // {
    // //     $this->db = &$db;
    // // }

    public function get_pertanyaan()
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penanya=ms_user.email', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getResultArray();
    }

    public function get_pertanyaan_terakhir()
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('acc_pimpinan', 1)
            ->orderBy('id_pertanyaan', 'DESC')
            ->limit(3)
            ->get()->getResultArray();
    }

    public function get_all_pertanyaan_kasus()
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penanya=ms_user.email', 'left')
            ->join('ms_kasus', 'tr_pertanyaan_jawaban.id_kasus=ms_kasus.id_kasus', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getResultArray();
    }
    public function get_detail_pertanyaan($id_pertanyaan)
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('id_pertanyaan', $id_pertanyaan)
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penanya=ms_user.email', 'left')
            ->join('ms_kasus', 'tr_pertanyaan_jawaban.id_kasus=ms_kasus.id_kasus', 'left')
            ->get()->getRowArray();
    }

    public function get_nama_penyuluh($id_pertanyaan)
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('id_pertanyaan', $id_pertanyaan)
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penjawab=ms_user.email', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getRowArray();
    }

    public function get_nama_penanya($id_pertanyaan)
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('id_pertanyaan', $id_pertanyaan)
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penanya=ms_user.email', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getRowArray();
    }

    public function get_nama_pimpinan($id_pertanyaan)
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('id_pertanyaan', $id_pertanyaan)
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_pimpinan=ms_user.email', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getRowArray();
    }

    public function get_pertanyaan_terjawab()
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('status_pertanyaan', '1')
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penanya=ms_user.email', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getResultArray();
    }

    public function get_nama_penyuluh_all()
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penjawab=ms_user.email', 'left')
            ->join('ms_kasus', 'tr_pertanyaan_jawaban.id_kasus=ms_kasus.id_kasus', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getResultArray();
    }

    public function get_nama_penyuluh_all_spesifik($email)
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('email_penjawab', $email)
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penjawab=ms_user.email', 'left')
            ->join('ms_kasus', 'tr_pertanyaan_jawaban.id_kasus=ms_kasus.id_kasus', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getResultArray();
    }

    public function get_nama_penyuluh_all_spesifik_terjawab($email)
    {
        $array = array('email_penjawab' => $email, 'status_pertanyaan' => '1');
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where($array)
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penjawab=ms_user.email', 'left')
            ->join('ms_kasus', 'tr_pertanyaan_jawaban.id_kasus=ms_kasus.id_kasus', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getResultArray();
    }

    public function get_pertanyaan_kasus($id_kasus)
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('tr_pertanyaan_jawaban.id_kasus', $id_kasus)
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penjawab=ms_user.email', 'left')
            ->join('ms_kasus', 'tr_pertanyaan_jawaban.id_kasus=ms_kasus.id_kasus', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getResultArray();
    }

    public function get_pertanyaan_penanya($email)
    {
        return $this->db->table('tr_pertanyaan_jawaban')
            ->where('email_penanya', $email)
            ->join('ms_user', 'tr_pertanyaan_jawaban.email_penanya=ms_user.email', 'left')
            ->join('ms_kasus', 'tr_pertanyaan_jawaban.id_kasus=ms_kasus.id_kasus', 'left')
            ->orderBy('id_pertanyaan', 'DESC')
            ->get()->getResultArray();
    }
}
