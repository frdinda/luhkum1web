<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class ArtikelModel extends Model
{
    protected $table      = 'tr_artikel';
    protected $primaryKey = 'id_artikel';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_artikel', 'tanggal_artikel', 'judul_artikel', 'email', 'isi_artikel'];

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

    public function get_all_artikel()
    {
        return $this->db->table('tr_artikel')
            ->join('ms_user', 'tr_artikel.email=ms_user.email')
            ->orderBy('id_artikel', 'DESC')
            ->get()->getResultArray();
    }

    public function get_artikel_user($email)
    {
        return $this->db->table('tr_artikel')
            ->where('email', $email)
            ->orderBy('id_artikel', 'DESC')
            ->get()->getResultArray();
    }

    public function get_artikel_detail($id_artikel)
    {
        return $this->db->table('tr_artikel')
            ->where('id_artikel', $id_artikel)
            ->get()->getRowArray();
    }

    public function del_artikel($id_artikel)
    {
        return $this->db->table('tr_artikel')
            ->where('id_artikel', $id_artikel)
            ->delete();
    }

    public function get_artikel_terakhir()
    {
        return $this->db->table('tr_artikel')
            ->orderBy('id_artikel', 'DESC')
            ->limit(4)
            ->get()->getResultArray();
    }
}
