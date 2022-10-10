<?php

namespace App\Controllers\Registrasi;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Registrasi extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('registrasi/registrasi');
    }

    public function registrasi()
    {
        $email = $this->request->getVar('email-pemohon');
        $user = $this->userModel->get_detail_user($email);

        if (isset($user['email'])) {
            echo "<script>
            alert('Email Sudah Terdaftar, Silahkan Login');
            window.location.href='/login';
            </script>";
        } else {
            $nama = $this->request->getVar('nama-pemohon');

            $password = $this->request->getVar('password_user');
            $konfirmasi_password = $this->request->getVar('konfirmasi_password_user');

            if ($password != $konfirmasi_password) {
                echo "<script>
            alert('Password dan Konfirmasi Password Tidak Sama, Silahkan Ulang Kembali');
            window.location.href='/regis';
            </script>";
            } else {
                $authcode = md5(time() . $email);
                $this->userModel->insert([
                    'email' => $email,
                    'id_akses' => 'masyarakat',
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
                    'auth' => 0,
                    'auth_code' => $authcode,
                    'no_telp' => $this->request->getVar('no_telp')
                ]);
                $subject = 'Verifikasi Akun Konsultasi Hukum Kumham Sumut';
                $message = "Selamat Anda telah berhasil melakukan registrasi pada Sistem Konsultasi Hukum Kantor Wilayah Kementerian Hukum dan HAM Sumatera Utara. Silahkan klik link di bawah ini untuk menyelesaikan proses verifikasi.";
                $path = base_url('/33b3/' . $authcode);
                $link = "Verifikasi";
                $data = [
                    'email' => $email,
                    'nama' => $nama,
                    'message' => $message,
                    'path' => $path,
                    'subject' => $subject,
                    'link' => $link
                ];
                $this->_sendEmail($data);
            }
        }
    }

    private function _sendEmail($data)
    {
        $to = $data['email'];
        $message = 'Hai, ' . $data['nama'] . '. ' . $data['message'] . ' <br> <a href="' . $data['path'] . '" >' . $data['link'] . '</a>';
        // $message = "LOL";
        $email = \Config\Services::email();
        $email->setSubject($data['subject']);
        $email->setTo($to);
        $email->setMessage($message);
        if ($email->send()) {
            // ganti
            echo "<script>
            alert('Email Notifikasi Telah Terkirim');
            window.location.href='/login';
            </script>";
        } else {
            // pas production, matikan atau ganti echo lain
            echo "<script>
            alert('Sepertinya Ada Masalah.');
            window.location.href='/';
            </script>";
        }
    }

    public function verify_registrasi($authcode)
    {
        $user = $this->userModel->get_detail_user_by_authcode($authcode);
        if (isset($user)) {
            $this->userModel->save([
                'email' => $user['email'],
                'auth' => 1
            ]);
            $this->session->set('id_akses', $user['id_akses']);
            $this->session->set('email', $user['email']);
            $this->session->set('nama', $user['nama']);
            $this->session->set('status', 'login');
            echo "<script>
            alert('Email Berhasil Terverifikasi');
            window.location.href='/konsul';
            </script>";
        } else {
            echo "<script>
            alert('Mohon Maaf, Terjadi Kesalahan');
            window.location.href='/';
            </script>";
        }
    }
}
