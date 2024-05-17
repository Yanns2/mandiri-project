<?php

namespace App\Controllers;

class coba extends BaseController
{
    public function index()
    {
        echo 'ini controller';
    }
    public function about($nama = 'Miftakhul Yannan', $kelas = 'XI RPL 2', $umur = 17)
    {
        echo "Halo, nama saya adalah $nama<br>
        kelas = $kelas, dan umur saya $umur tahun";
    }
}
