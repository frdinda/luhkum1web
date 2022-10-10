<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class UserModel extends Model
{
    protected $table      = 'ms_user';
    protected $primaryKey = 'email';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['email', 'id_akses', 'nama', 'tempat_lahir', 'tanggal_lahir', 'jenis_kelamin', 'status_perkawinan', 'tempat_tinggal', 'kelurahan', 'kecamatan', 'kabupaten', 'pendidikan', 'pendidikan', 'pekerjaan', 'password', 'auth', 'auth_code', 'jabatan_pimpinan', 'no_telp'];

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

    public function get_user()
    {
        return $this->db->table('ms_user')
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->get()->getResultArray();
    }

    public function insert_user($data)
    {
        return $this->db->table('ms_user')->insert($data);
    }

    public function get_detail_user($email)
    {
        return $this->db->table('ms_user')
            ->where('email', $email)
            ->join('ms_akses', 'ms_user.id_akses=ms_akses.id_akses', 'left')
            ->get()->getRowArray();
    }

    public function get_detail_user_by_authcode($authcode)
    {
        return $this->db->table('ms_user')
            ->where('auth_code', $authcode)
            ->get()->getRowArray();
    }

    public function get_all_luhkum()
    {
        return $this->db->table('ms_user')
            ->where('id_akses', 'luhkum')
            ->get()->getResultArray();
    }
}
