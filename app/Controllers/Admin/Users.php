<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;

class Users extends BaseController
{
    public function index()
    {
        echo 'ini controller Users di dalam folder admin';
    }
    public function about($nama = 'Miftakhul Yannan', $kelas = 'XI RPL 2', $umur = 17)
    {
        echo "Halo, nama saya adalah $nama<br>
        kelas = $kelas, dan umur saya $umur tahun";
    }
}
