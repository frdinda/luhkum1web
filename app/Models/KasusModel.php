<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class KasusModel extends Model
{
    protected $table      = 'ms_kasus';
    protected $primaryKey = 'id_kasus';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_kasus', 'jenis_kasus'];

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

    public function get_kasus()
    {
        return $this->db->table('ms_kasus')
            ->get()->getResultArray();
    }
    public function get_detail_kasus($id_kasus)
    {
        return $this->db->table('ms_kasus')
            ->where('id_kasus', $id_kasus)
            ->get()->getRowArray();
    }
    public function get_detail_kasus_by_jenis($jenis_kasus)
    {
        return $this->db->table('ms_kasus')
            ->where('jenis_kasus', $jenis_kasus)
            ->get()->getRowArray();
    }
}
