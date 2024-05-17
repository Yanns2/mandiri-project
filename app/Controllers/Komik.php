<?php

namespace App\Controllers;

use App\Models\KomikModel;

class Komik extends BaseController
{
    protected $komikModel;
    public function __construct()
    {
        $this->komikModel = new KomikModel();
    }
    public function index()
    {
        //$komik = $this->komikModel->findAll();

        $data = [
            'title' => 'Daftar Komik',
            'komik' => $this->komikModel->getKomik()
        ];
        return view('komik/index', $data);
    }
    public function detail($slug)
    {
        $data = [
            'title' => 'Detail Komik',
            'komik' => $this->komikModel->getKomik($slug)
        ];

        if (empty($data['komik'])) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException('judul komik' . $slug . 'tidak ditemukan');
        }

        return view('komik/detail', $data);
    }
    public function create()
    {
        session();
        $data = [
            'title' => 'Form tambah data komik',
            'validasi' => \Config\Services::validation()
        ];
        return view('komik/create', $data);
    }
    public function save()
    {
        if (!$this->validate([
            'judul' => 'required|is_unique[komik.judul]'
        ])) {
            $validasi = \Config\Services::validation();
            return redirect()->to('/komik/create')->withInput()->with('validasi', $validasi);
        }

        $fileSampul = $this->request->getFile('sampul');
        $fileSampul->move('img');
        $namaSampul = $fileSampul->getName();

        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $namaSampul
        ]);
        session()->setFlashdata('pesan', 'Data berhasil ditambahkan');
        return redirect()->to('/komik');
    }

    public function delete($id)
    {
        //$this->komikModel->where('id', $id);
        $this->komikModel->delete($id);
        session()->setFlashdata('pesan', 'Data berhasil dihapus');
        return redirect()->to('/komik');
    }
    public function edit($slug)
    {
        $data = [
            'title' => 'Form edit data komik',
            'validation' => \Config\Services::validation(),
            'komik' => $this->komikModel->getKomik($slug)
        ];
        return view('komik/edit', $data);
    }
    public function update($id)
    {
        $slug = url_title($this->request->getVar('judul'), '-', true);
        $this->komikModel->save([
            'id' => $id,
            'judul' => $this->request->getVar('judul'),
            'slug' => $slug,
            'penulis' => $this->request->getVar('penulis'),
            'penerbit' => $this->request->getVar('penerbit'),
            'sampul' => $this->request->getVar('sampul')
        ]);
        session()->setFlashdata('pesan', 'Data berhasil diubah');
        return redirect()->to('/komik');
    }
    public function simpan()
    {
        $data = [
            'judul' => $this->request->getPost('judul'),
            'penulis'    => $this->request->getPost('penulis'),
            'penerbit' => $this->request->getPost('penerbit'),
            'sampul' => $this->request->getPost('sampul')
        ];

        // Definisikan aturan validasi
        $rules = [
            'judul' => 'required|is_unique',
            'penulis'    => 'required',
            'penerbit' => 'required',
            'sampul' => 'required|is_unique'
        ];

        // Definisikan pesan kesalahan validasi
        $messages = [
            'judul' => [
                'required'   => 'Masukan judul komik',
                'is_unique' => 'Judul komik sudah ada'
            ],
            'penulis' => [
                'required'   => 'Masukan nama penulis',
            ],
            'penerbit' => [
                'required'   => 'Masukan nama penerbit',
            ],
            'sampul' => [
                'required'   => 'Masukan sampul',
                'is_unique' => 'Sampul sudah ada'
            ]
        ];

        // Lakukan validasi
        if ($this->validate($rules, $messages)) {
            echo 'Data berhasil divalidasi.';
        } else {
            // Jika validasi gagal, kembali ke halaman sebelumnya dengan pesan kesalahan
            return redirect()->back()->withInput()->with('errors', $this->validator->getErrors());
        }
    }
}
