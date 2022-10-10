<?php

namespace App\Controllers\Podcast;

use App\Controllers\BaseController;
use App\Models\PodcastModel;
use App\Models\UserModel;

class Podcast extends BaseController
{
    protected $podcastModel;
    protected $userModel;

    public function __construct()
    {
        $this->podcastModel = new PodcastModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $data_user = $this->userModel->get_detail_user($email);
            if ($id_akses == 'super') {
                $podcast_user = $this->podcastModel->get_all_podcast();
            } else {
                $podcast_user = $this->podcastModel->get_podcast_user($email);
            }
            $jumlah_podcast = count($podcast_user);
            $data = [
                'id_akses' => $id_akses,
                'podcast_user' => $podcast_user,
                'jumlah_podcast' => $jumlah_podcast,
                'email' => $email,
                'data_user' => $data_user
            ];
            return view('/podcast/dashboard_podcast', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function tambahPodcast()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $data_user = $this->userModel->get_detail_user($email);
            $data = [
                'id_akses' => $id_akses,
                'email' => $email,
                'data_user' => $data_user
            ];
            return view('/podcast/tambah_podcast', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function savetambahPodcast()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $judul_podcast = $this->request->getVar('judul_podcast');
            $tanggal_podcast = $this->request->getVar('tanggal_podcast');
            $caption_podcast = $this->request->getVar('caption_podcast');
            $link_podcast = $this->request->getVar('link_podcast');
            helper('text');
            $nama_arsip = explode('=', $link_podcast, 2);
            $this->podcastModel->insert([
                'email' => $email,
                'tanggal_podcast' => $tanggal_podcast,
                'judul_podcast' => $judul_podcast,
                'thumbnail_podcast' => $nama_arsip[1],
                'caption_podcast' => $caption_podcast,
                'link_podcast' => $link_podcast
            ]);
            echo "<script>
            alert('Data Berhasil diinput.');
            window.location.href='/podluh';
            </script>";
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    private function _uploadFile($data)
    {
        if (!$this->validate([
            'thumbnail_podcast' => [
                'label' => 'Thumbnail Podcast',
                'rules' => 'uploaded[thumbnail_podcast]|max_size[thumbnail_podcast,5000]|ext_in[thumbnail_podcast,jpg,png,jpeg]',
                'errors' => [
                    'uploaded' => '{field} Harap Mengupload Thumbnail Podcast',
                    'max_size' => '{field} Ukuran melebihi 2MB',
                    'ext_in' => '{field} Format dokumen bukan JPG'
                ]
            ]
        ])) {
            echo "<script>
            alert('Thumbnail Podcast harus dalam format JPG dan tidak melebihi 2MB');
            window.location.href='/podcast/tambah'; 
            </script>";
        } else {
            $nama_arsip = $data['nama_arsip'] . '.jpg';
            $thumbnail_podcast = $this->request->getFile('thumbnail_podcast');
            $thumbnail_podcast->move('thumbnail_podcast', $nama_arsip);
            $this->podcastModel->insert([
                'email' => $data['email'],
                'tanggal_podcast' => $data['tanggal_podcast'],
                'judul_podcast' => $data['judul_podcast'],
                'thumbnail_podcast' => $nama_arsip,
                'caption_podcast' => $data['caption_podcast'],
                'link_podcast' => $data['link_podcast']
            ]);
            echo "<script>
            alert('Data Berhasil diinput.');
            window.location.href='/podluh';
            </script>";
        }
    }

    public function detailPodcast($id_podcast)
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $data_user = $this->userModel->get_detail_user($email);
            $detail_podcast = $this->podcastModel->get_podcast_detail($id_podcast);
            $data = [
                'id_akses' => $id_akses,
                'email' => $email,
                'data_user' => $data_user,
                'detail_podcast' => $detail_podcast
            ];
            return view('/podcast/detail_podcast', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function editPodcast($id_podcast)
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $data_user = $this->userModel->get_detail_user($email);
            $detail_podcast = $this->podcastModel->get_podcast_detail($id_podcast);
            $data = [
                'id_akses' => $id_akses,
                'email' => $email,
                'data_user' => $data_user,
                'detail_podcast' => $detail_podcast
            ];
            if ($email != $detail_podcast['email'] || $id_akses != 'super') {
                echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
            } else {
                return view('/podcast/edit_podcast', $data);
            }
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function saveeditPodcast()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            if ($email == $this->request->getVar('email') || $id_akses == 'super') {
                $id_podcast = $this->request->getVar('id_podcast');
                $judul_podcast = $this->request->getVar('judul_podcast');
                $tanggal_podcast = $this->request->getVar('tanggal_podcast');
                $caption_podcast = $this->request->getVar('caption_podcast');
                $link_podcast = $this->request->getVar('link_podcast');
                $thumbnail_podcast = explode('=', $link_podcast, 2);
                $this->podcastModel->save([
                    'id_podcast' => $id_podcast,
                    'email' => $email,
                    'tanggal_podcast' => $tanggal_podcast,
                    'judul_podcast' => $judul_podcast,
                    'thumbnail_podcast' => $thumbnail_podcast[1],
                    'caption_podcast' => $caption_podcast,
                    'link_podcast' => $link_podcast
                ]);
                echo "<script>
                alert('Data Berhasil diinput.');
                window.location.href='/podluh';
                </script>";
            } else {
                echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
            }
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    private function _uploadFile2($data)
    {
        if (!$this->validate([
            'thumbnail_podcast' => [
                'label' => 'Thumbnail Podcast',
                'rules' => 'uploaded[thumbnail_podcast]|max_size[thumbnail_podcast,5000]|ext_in[thumbnail_podcast,jpg,png,jpeg]',
                'errors' => [
                    'uploaded' => '{field} Harap Mengupload Thumbnail Podcast',
                    'max_size' => '{field} Ukuran melebihi 2MB',
                    'ext_in' => '{field} Format dokumen bukan JPG'
                ]
            ]
        ])) {
            echo "<script>
            alert('Thumbnail Podcast harus dalam format JPG dan tidak melebihi 2MB');
            window.location.href='/podluh'; 
            </script>";
        } else {
            $nama_arsip = $data['nama_arsip'] . '.jpg';
            $thumbnail_podcast = $this->request->getFile('thumbnail_podcast');
            $thumbnail_podcast->move('thumbnail_podcast', $nama_arsip);
            $this->podcastModel->save([
                'id_podcast' => $data['id_podcast'],
                'email' => $data['email'],
                'tanggal_podcast' => $data['tanggal_podcast'],
                'judul_podcast' => $data['judul_podcast'],
                'thumbnail_podcast' => $nama_arsip,
                'caption_podcast' => $data['caption_podcast'],
                'link_podcast' => $data['link_podcast']
            ]);
            echo "<script>
            alert('Data Berhasil diinput.');
            window.location.href='/podluh';
            </script>";
        }
    }

    public function hapusPodcast($id_podcast)
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $detail_podcast = $this->podcastModel->get_podcast_detail($id_podcast);
            $email = $this->session->email;
            if ($email == $detail_podcast['email'] || $id_akses == 'super') {
                $this->podcastModel->del_podcast($id_podcast);
                echo "<script>
            alert('Data Podcast Berhasil Dihapus');
            window.location.href='/podluh';
            </script>";
            } else {
                echo "<script>
        alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
        window.location.href='/podluh';
        </script>";
            }
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }
}
