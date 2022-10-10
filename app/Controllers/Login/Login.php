<?php

namespace App\Controllers\Login;

use App\Controllers\BaseController;
use App\Models\UserModel;

class Login extends BaseController
{
    protected $userModel;

    public function __construct()
    {
        $this->userModel = new UserModel();
    }

    public function index()
    {
        return view('login/login');
    }

    public function login()
    {
        $email = $this->request->getVar('email');
        $password = md5($this->request->getVar('password'));
        $user = $this->userModel->get_detail_user($email);

        if ($user['password'] == $password && $user['auth'] != 0) {
            $this->session->set('id_akses', $user['id_akses']);
            $this->session->set('email', $user['email']);
            $this->session->set('nama', $user['nama']);
            return redirect()->to('konsul');
        } else if (empty($user['email']) || $user['password'] != $password) {
            echo "<script>
            alert('Email Atau Password Salah, Silahkan Login Kembali');
            window.location.href='/login';
            </script>";
        } else if ($user['auth'] == 0) {
            echo "<script>
            alert('Harap Lakukan Verifikasi Melalui Email yang Telah Dikirim');
            window.location.href='/';
            </script>";
        }
    }

    public function logout()
    {
        $id_akses = null;
        unset($_SESSION['nama']);
        unset($_SESSION['email']);
        unset($_SESSION['id_akses']);
        return redirect()->to('/');
    }
}
