<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class PodcastModel extends Model
{
    protected $table      = 'tr_podcast';
    protected $primaryKey = 'id_podcast';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_podcast', 'tanggal_podcast', 'judul_podcast', 'caption_podcast', 'link_podcast', 'email', 'thumbnail_podcast'];

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

    public function get_all_podcast()
    {
        return $this->db->table('tr_podcast')
            ->orderBy('tanggal_podcast', 'DESC')
            ->get()->getResultArray();
    }

    public function get_podcast_aktif()
    {
        $time = date('Y-m-d H:i:s');
        return $this->db->table('tr_podcast')
            ->where('tanggal_podcast <=', $time)
            ->orderBy('tanggal_podcast', 'DESC')
            ->get()->getResultArray();
    }

    public function get_podcast_user($email)
    {
        return $this->db->table('tr_podcast')
            ->where('email', $email)
            ->orderBy('tanggal_podcast', 'DESC')
            ->get()->getResultArray();
    }

    public function get_podcast_detail($id_podcast)
    {
        return $this->db->table('tr_podcast')
            ->where('id_podcast', $id_podcast)
            ->get()->getRowArray();
    }

    public function del_podcast($id_podcast)
    {
        return $this->db->table('tr_podcast')
            ->where('id_podcast', $id_podcast)
            ->delete();
    }

    public function get_podcast_terakhir()
    {
        return $this->db->table('tr_podcast')
            ->orderBy('tanggal_podcast', 'DESC')
            ->limit(4)
            ->get()->getResultArray();
    }
}
