<?php

namespace App\Controllers\Beranda;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;
use App\Models\ArtikelModel;
use App\Models\PodcastModel;
use App\Models\VideoModel;

class Publik extends BaseController
{
    protected $pertanyaanModel;
    protected $kasusModel;
    protected $userModel;
    protected $artikelModel;
    protected $podcastModel;
    protected $videoModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
        $this->kasusModel = new KasusModel();
        $this->userModel = new UserModel();
        $this->artikelModel = new ArtikelModel();
        $this->podcastModel = new PodcastModel();
        $this->videoModel = new VideoModel();
    }


    public function index()
    {
        // $jenis_kasus = $this->request->getVar('jenis-kasus');
        // if (isset($jenis_kasus)) {
        //     $all_pertanyaan = $this->pertanyaanModel->get_pertanyaan_kasus($jenis_kasus);
        // } else {
        //     $all_pertanyaan = $this->pertanyaanModel->get_pertanyaan();
        // }
        $all_pertanyaan = $this->pertanyaanModel->get_pertanyaan();
        $all_kasus = $this->kasusModel->get_kasus();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data = [
            'all_pertanyaan' => $all_pertanyaan,
            'all_kasus' => $all_kasus,
            'id_akses' => $this->session->id_akses,
            'data_user' => $data_user
        ];
        // dd($this->session->id_akses);
        return view('beranda/publik', $data);
    }

    public function filter_jenis_kasus()
    {
        $jenis_kasus = $this->request->getVar('jenis-kasus');
        if ($jenis_kasus == "Semua Kasus") {
            $all_pertanyaan = $this->pertanyaanModel->get_pertanyaan();
        } else {
            $all_pertanyaan = $this->pertanyaanModel->get_pertanyaan_kasus($jenis_kasus);
        }
        $all_kasus = $this->kasusModel->get_kasus();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data = [
            'all_pertanyaan' => $all_pertanyaan,
            'all_kasus' => $all_kasus,
            'id_akses' => $this->session->id_akses,
            'data_user' => $data_user
        ];
        return view('beranda/publik', $data);
    }

    public function listartikel()
    {
        $all_artikel = $this->artikelModel->get_all_artikel();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data = [
            'all_artikel' => $all_artikel,
            'id_akses' => $this->session->id_akses,
            'data_user' => $data_user
        ];
        // dd($this->session->id_akses);
        return view('beranda/list_artikel', $data);
    }

    public function listpodcast()
    {
        $all_podcast = $this->podcastModel->get_all_podcast();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data = [
            'all_podcast' => $all_podcast,
            'id_akses' => $this->session->id_akses,
            'data_user' => $data_user
        ];
        // dd($this->session->id_akses);
        return view('beranda/list_podcast', $data);
    }

    public function listvideo()
    {
        $all_video = $this->videoModel->get_all_video();
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);
        $data = [
            'all_video' => $all_video,
            'id_akses' => $this->session->id_akses,
            'data_user' => $data_user
        ];
        // dd($this->session->id_akses);
        return view('beranda/list_video', $data);
    }
}
