<?php

namespace App\Controllers\WebPage;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;
use App\Models\ArtikelModel;
use App\Models\PodcastModel;
use App\Models\VideoModel;

class Home extends BaseController
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
        $pertanyaan_terakhir = $this->pertanyaanModel->get_pertanyaan_terakhir();
        $artikel_terakhir = $this->artikelModel->get_artikel_terakhir();
        $podcast_terakhir = $this->podcastModel->get_podcast_terakhir();
        $video_terakhir = $this->videoModel->get_video_terakhir();
        $all_luhkum = $this->userModel->get_all_luhkum();
        $jumlah_pertanyaan = count($this->pertanyaanModel->get_pertanyaan());
        $jumlah_artikel = count($this->artikelModel->get_all_artikel());
        $jumlah_podcast = count($this->podcastModel->get_all_podcast());
        $jumlah_video = count($this->videoModel->get_all_video());
        $jumlah_luhkum = count($all_luhkum);
        $jumlah_pod_vid = $jumlah_podcast + $jumlah_video;

        $data = [
            'pertanyaan_terakhir' => $pertanyaan_terakhir,
            'artikel_terakhir' => $artikel_terakhir,
            'podcast_terakhir' => $podcast_terakhir,
            'video_terakhir' => $video_terakhir,
            'all_luhkum' => $all_luhkum,
            'jumlah_pertanyaan' => $jumlah_pertanyaan,
            'jumlah_artikel' => $jumlah_artikel,
            'jumlah_pod_vid' => $jumlah_pod_vid,
            'jumlah_luhkum' => $jumlah_luhkum
        ];

        return view('web_page/home', $data);
    }
}
