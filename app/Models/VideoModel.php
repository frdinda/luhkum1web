<?php

namespace App\Models;

use CodeIgniter\Model;
// use CodeIgniter\Database\ConnectionInterface;

class VideoModel extends Model
{
    protected $table      = 'tr_video';
    protected $primaryKey = 'id_video';

    // // protected $useAutoIncrement = true;

    // // protected $returnType     = 'array';
    // // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_video', 'judul_video', 'caption_video', 'link_video', 'email', 'thumbnail_video'];

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

    public function get_all_video()
    {
        return $this->db->table('tr_video')
            ->orderBy('id_video', 'DESC')
            ->get()->getResultArray();
    }

    public function get_video_user($email)
    {
        return $this->db->table('tr_video')
            ->where('email', $email)
            ->orderBy('id_video', 'DESC')
            ->get()->getResultArray();
    }

    public function get_video_detail($id_video)
    {
        return $this->db->table('tr_video')
            ->where('id_video', $id_video)
            ->get()->getRowArray();
    }

    public function del_video($id_video)
    {
        return $this->db->table('tr_video')
            ->where('id_video', $id_video)
            ->delete();
    }

    public function get_video_terakhir()
    {
        return $this->db->table('tr_video')
            ->orderBy('id_video', 'DESC')
            ->limit(4)
            ->get()->getResultArray();
    }
}
