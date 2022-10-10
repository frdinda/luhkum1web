<?php

namespace App\Controllers\Kelola;

use App\Controllers\BaseController;
use App\Models\PertanyaanModel;
use App\Models\KasusModel;
use App\Models\UserModel;
use App\Models\AksesModel;

class KelolaUser extends BaseController
{
    protected $pertanyaanModel;
    protected $kasusModel;
    protected $userModel;
    protected $aksesModel;

    public function __construct()
    {
        $this->pertanyaanModel = new PertanyaanModel();
        $this->kasusModel = new KasusModel();
        $this->userModel = new UserModel();
        $this->aksesModel = new AksesModel();
    }

    public function index()
    {
        $id_akses = $this->session->id_akses;
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);

        if ($id_akses == "super") {
            $all_user = $this->userModel->get_user();
            $data = [
                'id_akses' => $id_akses,
                'all_user' => $all_user,
                'data_user' => $data_user
            ];
            return view('kelola/user/kelola_user', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function tambahUser()
    {
        $id_akses = $this->session->id_akses;
        $email = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email);

        if ($id_akses == "super") {
            $data = [
                'id_akses' => $id_akses,
                'data_user' => $data_user
            ];
            return view('kelola/user/tambah_user', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function editUser($email)
    {
        $id_akses = $this->session->id_akses;
        $all_akses = $this->aksesModel->get_all_akses();
        $email_user = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email_user);
        if ($id_akses == "super") {
            $detail_email = $this->userModel->get_detail_user($email);
            $data = [
                'id_akses' => $id_akses,
                'detail_user' => $detail_email,
                'data_user' => $data_user,
                'all_akses' => $all_akses
            ];
            return view('kelola/user/edit_user', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function detailUser($email)
    {
        $id_akses = $this->session->id_akses;
        $email_user = $this->session->email;
        $data_user = $this->userModel->get_detail_user($email_user);

        if ($id_akses == "super") {
            $detail_email = $this->userModel->get_detail_user($email);
            $data = [
                'id_akses' => $id_akses,
                'all_user' => $detail_email,
                'data_user' => $data_user
            ];
            return view('kelola/user/detail_user', $data);
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
        }
    }

    public function saveTambahUser()
    {
        $id_akses = $this->session->id_akses;

        if ($id_akses == "super") {
            $email = $this->request->getVar('email-pemohon');
            $user = $this->userModel->get_detail_user($email);
            if (isset($user['email'])) {
                echo "<script>
            alert('Email Sudah Terdaftar, Silahkan Login');
            window.location.href='/kelus';
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
        } else {
            echo "<script>
            alert('Mohon Maaf Anda Tidak Memiliki Akses Pada Fitur Ini');
            window.location.href='/';
            </script>";
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
            window.location.href='/kelus';
            </script>";
        } else {
            // pas production, matikan atau ganti echo lain
            echo "<script>
            alert('Sepertinya Ada Masalah.');
            window.location.href='/';
            </script>";
        }
    }

    public function hapus($email)
    {
        $this->userModel->delete($email);
        return redirect()->to('/kelus');
    }
}
