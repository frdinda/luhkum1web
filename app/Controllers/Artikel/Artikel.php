<?php

namespace App\Controllers\Artikel;

use App\Controllers\BaseController;
use App\Models\ArtikelModel;
use App\Models\UserModel;

class Artikel extends BaseController
{
    protected $artikelModel;
    protected $userModel;

    public function __construct()
    {
        $this->artikelModel = new ArtikelModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $email = $this->session->email;
            $data_user = $this->userModel->get_detail_user($email);
            $artikel_user = $this->artikelModel->get_artikel_user($email);
            $jumlah_artikel = count($artikel_user);
            $data = [
                'id_akses' => $id_akses,
                'artikel_user' => $artikel_user,
                'jumlah_artikel' => $jumlah_artikel,
                'email' => $email,
                'data_user' => $data_user
            ];
            return view('/artikel/dashboard_artikel', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function tambahArtikel()
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
            return view('/artikel/tambah_artikel', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function savetambahArtikel()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $tanggal_artikel = date('Y-m-d');
            $judul_artikel = $this->request->getVar('judul_artikel');
            $isi_artikel = $this->request->getVar('isi_artikel');
            $email = $this->session->email;
            if (strlen($judul_artikel) > 1000) {
                echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/artikel/tambah';
            </script>";
            } else {
                $this->artikelModel->save([
                    'tanggal_artikel' => $tanggal_artikel,
                    'judul_artikel' => $judul_artikel,
                    'isi_artikel' => $isi_artikel,
                    'email' => $email
                ]);

                $data_user = $this->userModel->get_detail_user($email);
                $artikel_user = $this->artikelModel->get_artikel_user($email);
                $jumlah_artikel = count($artikel_user);
                $data = [
                    'id_akses' => $id_akses,
                    'artikel_user' => $artikel_user,
                    'jumlah_artikel' => $jumlah_artikel,
                    'email' => $email,
                    'data_user' => $data_user
                ];
                return view('/artikel/dashboard_artikel', $data);
            }
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function detailArtikel($arr_id)
    {
        $id_akses = $this->session->id_akses;
        $arr1 = explode('-', $arr_id);
        $id_artikel = $arr1[1];
        $detail_artikel = $this->artikelModel->get_artikel_detail($id_artikel);
        $email = $this->session->email;
        $email_penulis = $detail_artikel['email'];
        $data_user = $this->userModel->get_detail_user($email);
        $data = [
            'id_akses' => $id_akses,
            'detail_artikel' => $detail_artikel,
            'email' => $email,
            'data_user' => $data_user,
            'email_penulis' => $email_penulis
        ];
        return view('/artikel/detail_artikel', $data);
    }

    public function editArtikel($arr_id)
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $arr1 = explode('-', $arr_id);
            $id_artikel = $arr1[1];
            $detail_artikel = $this->artikelModel->get_artikel_detail($id_artikel);
            $email = $this->session->email;
            $email_penulis = $detail_artikel['email'];
            if ($email == $email_penulis || $id_akses == 'super') {
                $data_user = $this->userModel->get_detail_user($email);
                $data = [
                    'id_akses' => $id_akses,
                    'detail_artikel' => $detail_artikel,
                    'email' => $email,
                    'data_user' => $data_user
                ];
                return view('/artikel/edit_artikel', $data);
            } else {
                echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
            }
        }
    }

    public function saveeditArtikel()
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $id_artikel = $this->request->getVar('id_artikel');
            $judul_artikel = $this->request->getVar('judul_artikel');
            $isi_artikel = $this->request->getVar('isi_artikel');
            $email = $this->session->email;
            if (strlen($judul_artikel) > 1000) {
                echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/artluh';
            </script>";
            } else {
                if ($email == $this->request->getVar('email') || $id_akses == 'super') {
                    $this->artikelModel->save([
                        'id_artikel' => $id_artikel,
                        'judul_artikel' => $judul_artikel,
                        'isi_artikel' => $isi_artikel,
                        'email' => $email
                    ]);

                    $data_user = $this->userModel->get_detail_user($email);
                    $artikel_user = $this->artikelModel->get_artikel_user($email);
                    $jumlah_artikel = count($artikel_user);
                    $data = [
                        'id_akses' => $id_akses,
                        'artikel_user' => $artikel_user,
                        'jumlah_artikel' => $jumlah_artikel,
                        'email' => $email,
                        'data_user' => $data_user
                    ];
                    return view('/artikel/dashboard_artikel', $data);
                } else {
                    echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/artluh';
            </script>";
                }
            }
        } else {
            echo "<script>
            alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
            window.location.href='/';
            </script>";
        }
    }

    public function hapusArtikel($arr_id)
    {
        $id_akses = $this->session->id_akses;
        if (isset($id_akses) && $id_akses != 'masyarakat') {
            $arr1 = explode('-', $arr_id);
            $id_artikel = $arr1[1];
            $detail_artikel = $this->artikelModel->get_artikel_detail($id_artikel);
            $email = $this->session->email;
            if ($email == $detail_artikel['email'] || $id_akses == 'super') {
                $this->artikelModel->del_artikel($id_artikel);
                echo "<script>
            alert('Artikel Berhasil Dihapus');
            window.location.href='/artluh';
            </script>";
            } else {
                echo "<script>
        alert('Mohon Maaf, Anda Tidak Memiliki Akses untuk Page ini');
        window.location.href='/artluh';
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
