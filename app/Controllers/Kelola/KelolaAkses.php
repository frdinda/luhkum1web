<?php

namespace App\Controllers\Kelola;

use App\Controllers\BaseController;

class KelolaAkses extends BaseController
{
    public function index()
    {
        return view('kelola/akses/kelola_akses');
    }

    public function tambahAkses()
    {
        return view('kelola/akses/tambah_akses');
    }

    public function editAkses()
    {
        return view('kelola/akses/edit_akses');
    }
}
