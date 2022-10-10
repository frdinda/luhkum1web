<?php

namespace App\Controllers\EditDiri;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;

class EdUser extends BaseController
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
        $data = [
            'id_akses' => $id_akses,
            'email' => $email,
            'data_user' => $data_user
        ];
        return view('edit_diri/ed_user', $data);
    }

    public function update()
    {
        $id_akses = $this->session->id_akses;
        $email_user = $this->session->email;
        $email = $this->request->getVar('email-pemohon');
        if ($id_akses == "super" || $email == $email_user) {
            $nama = $this->request->getVar('nama-pemohon');
            $password = $this->request->getVar('password_user');
            $konfirmasi_password = $this->request->getVar('konfirmasi_password_user');            

            if ($password != $konfirmasi_password) {
                echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama, Silahkan Ulang Kembali');
            window.location.href='/regis';
            </script>";
            } else {
                $this->userModel->save([
                    'email' => $email,
                    'id_akses' => $this->request->getVar('jenis-akses'),
                    'nama' => $nama,
                    'tempat_lahir' => $this->request->getVar('tempat-lahir-pemohon'),
                    'tanggal_lahir' => $this->request->getVar('tanggal-lahir-pemohon'),
                    'jenis_kelamin' => $this->request->getVar('jenis-kelamin-pemohon'),
                    'status_perkawinan' => $this->request->getvar('status-perkawinan-pemohon'),
                    'tempat_tinggal' => $this->request->getVar('tempat-tinggal-pemohon'),
                    'kelurahan' => $this->request->getVar('kelurahan-pemohon'),
                    'kecamatan' => $this->request->getVar('kecamatan-pemohon'),
                    'kabupaten' => $this->request->getVar('kabupaten-pemohon'),
                    'pendidikan' => $this->request->getVar('pendidikan-pemohon'),
                    'pekerjaan' => $this->request->getVar('pekerjaan-pemohon'),
                    'password' => md5($password),
                    'no_telp' => $this->request->getVar('no_telp')
                ]);
                if ($id_akses == 'super') {
                    echo "<script>
                    alert('Data Berhasil Tersimpan');
                    window.location.href='/kelus';
                    </script>";
                } else {
                    echo "<script>
            alert('Data Berhasil Tersimpan');
            window.location.href='/edu';
            </script>";
                }
            }
        } else {
            echo "<script>
            alert('Anda Tidak Memiliki Akses');
            window.location.href='/';
            </script>";
        }
    }
}
