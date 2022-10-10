<?php

namespace App\Controllers\Video;

use App\Controllers\BaseController;
use App\Models\VideoModel;
use App\Models\UserModel;

class Video extends BaseController
{
    protected $videoModel;
    protected $userModel;

    public function __construct()
    {
        $this->videoModel = new VideoModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $data_user = $this->userModel->get_detail_user($email);
            $video_user = $this->videoModel->get_video_user($email);
            $jumlah_video = count($video_user);
            $data = [
                'id_akses' => $id_akses,
                'video_user' => $video_user,
                'jumlah_video' => $jumlah_video,
                'email' => $email,
                'data_user' => $data_user
            ];
            return view('/video/dashboard_video', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function tambahVideo()
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
            return view('/video/tambah_video', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function savetambahVideo()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $judul_video = $this->request->getVar('judul_video');
            $caption_video = $this->request->getVar('caption_video');
            $link_video = $this->request->getVar('link_video');
            helper('text');
            $nama_arsip = explode('=', $link_video, 2);
            $this->videoModel->insert([
                'email' => $email,
                'judul_video' => $judul_video,
                'thumbnail_video' => $nama_arsip[1],
                'caption_video' => $caption_video,
                'link_video' => $link_video
            ]);
            echo "<script>
            alert('Data Berhasil diinput.');
            window.location.href='/vidluh';
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
            'thumbnail_video' => [
                'label' => 'Thumbnail Video',
                'rules' => 'uploaded[thumbnail_video]|max_size[thumbnail_video,5000]|ext_in[thumbnail_video,jpg,png,jpeg]',
                'errors' => [
                    'uploaded' => '{field} Harap Mengupload Thumbnail Video',
                    'max_size' => '{field} Ukuran melebihi 2MB',
                    'ext_in' => '{field} Format dokumen bukan JPG'
                ]
            ]
        ])) {
            echo "<script>
            alert('Thumbnail Video harus dalam format JPG dan tidak melebihi 2MB');
            window.location.href='/video/tambah'; 
            </script>";
        } else {
            $nama_arsip = $data['nama_arsip'] . '.jpg';
            $thumbnail_video = $this->request->getFile('thumbnail_video');
            $thumbnail_video->move('thumbnail_video', $nama_arsip);
            $this->videoModel->insert([
                'email' => $data['email'],
                'judul_video' => $data['judul_video'],
                'thumbnail_video' => $nama_arsip,
                'caption_video' => $data['caption_video'],
                'link_video' => $data['link_video']
            ]);
            echo "<script>
            alert('Data Berhasil diinput.');
            window.location.href='/vidluh';
            </script>";
        }
    }

    public function detailVideo($id_video)
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $data_user = $this->userModel->get_detail_user($email);
            $detail_video = $this->videoModel->get_video_detail($id_video);
            $data = [
                'id_akses' => $id_akses,
                'email' => $email,
                'data_user' => $data_user,
                'detail_video' => $detail_video
            ];
            return view('/video/detail_video', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function editVideo($id_video)
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $data_user = $this->userModel->get_detail_user($email);
            $detail_video = $this->videoModel->get_video_detail($id_video);
            $data = [
                'id_akses' => $id_akses,
                'email' => $email,
                'data_user' => $data_user,
                'detail_video' => $detail_video
            ];
            if ($email != $detail_video['email'] || $id_akses != 'super') {
                echo "<script>
                alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
                window.location.href='/';
                </script>";
            } else {
                return view('/video/edit_video', $data);
            }
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function saveeditVideo()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            if ($email == $this->request->getVar('email') || $id_akses == 'super') {
                $id_video = $this->request->getVar('id_video');
                $judul_video = $this->request->getVar('judul_video');
                $caption_video = $this->request->getVar('caption_video');
                $link_video = $this->request->getVar('link_video');
                $thumbnail_video = explode('=', $link_video, 2);
                $this->videoModel->save([
                    'id_video' => $id_video,
                    'email' => $email,
                    'judul_video' => $judul_video,
                    'thumbnail_video' => $thumbnail_video[1],
                    'caption_video' => $caption_video,
                    'link_video' => $link_video
                ]);
                echo "<script>
                    alert('Data Berhasil diinput..');
                    window.location.href='/vidluh';
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

    public function saveeditVideogajadi()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            if ($email == $this->request->getVar('email') || $id_akses == 'super') {
                $id_video = $this->request->getVar('id_video');
                $judul_video = $this->request->getVar('judul_video');
                $caption_video = $this->request->getVar('caption_video');
                $link_video = $this->request->getVar('link_video');
                $thumbnail_video = $this->request->getFile('thumbnail_video');
                if ($_FILES['thumbnail_video']['size'] != 0) {
                    helper('text');
                    $nama_arsip = date('dmY') . '-' . random_string('alnum', 7);
                    $data = [
                        'email' => $email,
                        'judul_video' => $judul_video,
                        'caption_video' => $caption_video,
                        'nama_arsip' => $nama_arsip,
                        'link_video' => $link_video,
                        'id_video' => $id_video
                    ];
                    $this->_uploadFile2($data);
                } else {
                    $this->videoModel->save([
                        'id_video' => $id_video,
                        'email' => $email,
                        'judul_video' => $judul_video,
                        'caption_video' => $caption_video,
                        'link_video' => $link_video
                    ]);
                    echo "<script>
                    alert('Data Berhasil diinput..');
                    window.location.href='/vidluh';
                    </script>";
                }
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
            'thumbnail_video' => [
                'label' => 'Thumbnail Video',
                'rules' => 'uploaded[thumbnail_video]|max_size[thumbnail_video,5000]|ext_in[thumbnail_video,jpg,png,jpeg]',
                'errors' => [
                    'uploaded' => '{field} Harap Mengupload Thumbnail Video',
                    'max_size' => '{field} Ukuran melebihi 2MB',
                    'ext_in' => '{field} Format dokumen bukan JPG'
                ]
            ]
        ])) {
            echo "<script>
            alert('Thumbnail Video harus dalam format JPG dan tidak melebihi 2MB');
            window.location.href='/vidluh'; 
            </script>";
        } else {
            $nama_arsip = $data['nama_arsip'] . '.jpg';
            $thumbnail_video = $this->request->getFile('thumbnail_video');
            $thumbnail_video->move('thumbnail_video', $nama_arsip);
            $this->videoModel->save([
                'id_video' => $data['id_video'],
                'email' => $data['email'],
                'judul_video' => $data['judul_video'],
                'thumbnail_video' => $nama_arsip,
                'caption_video' => $data['caption_video'],
                'link_video' => $data['link_video']
            ]);
            echo "<script>
            alert('Data Berhasil diinput.');
            window.location.href='/vidluh';
            </script>";
        }
    }

    public function hapusVideo($id_video)
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $detail_video = $this->videoModel->get_video_detail($id_video);
            $email = $this->session->email;
            if ($email == $detail_video['email'] || $id_akses == 'super') {
                $this->videoModel->del_video($id_video);
                echo "<script>
            alert('Data Video Berhasil Dihapus');
            window.location.href='/vidluh';
            </script>";
            } else {
                echo "<script>
        alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
        window.location.href='/vidluh';
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
