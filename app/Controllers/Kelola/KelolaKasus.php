<?php

namespace App\Controllers\Kelola;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

class KelolaKasus extends BaseController
{
    protected $pertanyaanModel;
    protected $kasusModel;
    protected $userModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
        $this->kasusModel = new KasusModel();
        $this->userModel = new UserModel();
    }

    public function index()
    {
        $id_akses = $this->session->id_akses;
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);

        if ($id_akses == "super") {
            $all_kasus = $this->kasusModel->get_kasus();
            $data = [
                'id_akses' => $id_akses,
                'all_kasus' => $all_kasus,
                'data_user' => $data_user
            ];
            return view('kelola/kasus/kelola_kasus', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function tambahKasus()
    {
        $id_akses = $this->session->id_akses;
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);

        if ($id_akses == "super") {
            $data = [
                'id_akses' => $id_akses,
                'data_user' => $data_user
            ];
            return view('kelola/kasus/tambah_kasus', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function saveTambahKasus()
    {
        $id_akses = $this->session->id_akses;

        if ($id_akses == "super") {
            $jenis_kasus = $this->request->getVar('jenis_kasus');
            $kasus = $this->kasusModel->get_detail_kasus_by_jenis($jenis_kasus);
            if (isset($kasus)) {
                echo "<script>
            alert('Jenis Kasus Sudah Ada');
            window.location.href='/tmbkasus';
            </script>";
            } else {
                $this->kasusModel->insert([
                    'jenis_kasus' => $jenis_kasus
                ]);
                echo "<script>
            alert('Data Berhasil Diinput');
            window.location.href='/kelkas';
            </script>";
            }
        }
    }

    public function editKasus($id_kasus)
    {
        $id_akses = $this->session->id_akses;
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);

        if ($id_akses == "super") {
            $detail_kasus = $this->kasusModel->get_detail_kasus($id_kasus);
            $data = [
                'id_akses' => $id_akses,
                'detail_kasus' => $detail_kasus,
                'data_user' => $data_user
            ];
            return view('kelola/kasus/edit_kasus', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function saveEditKasus()
    {
        $id_akses = $this->session->id_akses;
        if ($id_akses == "super") {
            $this->kasusModel->save([
                'id_kasus' => $this->request->getVar('id_kasus'),
                'jenis_kasus' => $this->request->getVar('jenis_kasus')
            ]);
            echo "<script>
            alert('Data Berhasil Diubah');
            window.location.href='/kelkas';
            </script>";
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function hapus($id_kasus)
    {
        $this->kasusModel->delete($id_kasus);
        return redirect()->to('/kelkas');
    }
}
