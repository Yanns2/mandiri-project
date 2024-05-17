<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Apa extends BaseController
{
    public function index()
    {
        echo view('baru.php');
    }
}
