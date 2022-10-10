<?php

namespace App\Controllers\Beranda;

use App\Controllers\BaseController;

class Publik extends BaseController
{
    public function index()
    {
        return view('beranda/publik');
    }
}
