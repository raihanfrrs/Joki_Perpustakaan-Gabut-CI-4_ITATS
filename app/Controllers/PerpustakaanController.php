<?php

namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\Modelbuku;
use App\Models\Modelpengguna;
use CodeIgniter\HTTP\ResponseInterface;

class PerpustakaanController extends BaseController
{
    public function tampilkan_halaman_utama()
    {
        return view('home');
    }
    public function tampilkan_halaman_login()
    {
        return view('halaman_login');
    }
    public function tampilkan_halaman_kontak()
    {
        return view('kontak');
    }

    public function tampilkan_koleksi()
    {
        $db_buku = new Modelbuku();

        $data = [
            //'isi_db' => $db_buku->findAll()
            'isi_db' => $db_buku->paginate(5, 'isi_db'),

            'pager' => $db_buku->pager,

        ];
        return view('informasi_koleksi', $data);
    }

    public function tambah_data()
    {
        $db_buku = new Modelbuku();

        $fileSampul = $this->request->getFile('fm_sampul');

        $namaSampul = $fileSampul->getRandomName();

        $fileSampul->move('sampul', $namaSampul);

        $data = [
            'judul_buku' => $this->request->getVar('fm_judul'),
            'penulis' => $this->request->getVar('fm_penulis'),
            'penerbit' => $this->request->getVar('fm_penerbit'),
            'sampul' => $namaSampul
        ];
        $db_buku->insert($data);
        return redirect()->to(base_url('koleksi'));
    }

    public function hapus()
    {
        $db_buku = new Modelbuku();

        $id = $this->request->getVar('fm_id_sembunyi');

        $cari_buku = $db_buku->find($id);
        
        unlink('sampul/' . $cari_buku->sampul);

        $db_buku->delete($id);
        return redirect()->to(base_url('koleksi'));
    }

    public function pemutahiran()
    {
        $db_buku = new Modelbuku();
        $id = $this->request->getVar('fm_isbn');

        $fileSampul = $this->request->getFile('fm_sampul');

        if ($fileSampul->getError() == 4) {
            $namaSampul = $this->request->getVar('fm_sampul_lama');
        } else {
            $namaSampul = $fileSampul->getRandomName();
            $fileSampul->move('sampul', $namaSampul);
            unlink('sampul/' . $this->request->getVar('fm_sampul_lama'));
        }

        $data = [
            'judul_buku' => $this->request->getVar('fm_judul'),
            'penulis' => $this->request->getVar('fm_penulis'),
            'penerbit' => $this->request->getVar('fm_penerbit'),
            'sampul' => $namaSampul
        ];

        $db_buku->update($id, $data);
        return redirect()->to(base_url('koleksi'));
    }
    public function show_pengguna()
    {
        $data_pengguna = new Modelpengguna();
        $ambil_data = $data_pengguna->where('id', 'g-01')->first();
    }
    public function aksi_login()
    {
        $data_pengguna = new Modelpengguna();
        $id_pengguna = $this->request->getVar('f_id');
        $pass_pengguna = $this->request->getVar('f_pass');
        $ambil_data = $data_pengguna->where('id', $id_pengguna)->first();
        
        if ($ambil_data) {
            if ($id_pengguna == $ambil_data['id'] && $pass_pengguna == $ambil_data['password']) {
                $session = session();
                $userData = [
                    'user_id' => $ambil_data['id'],
                    'username' => $ambil_data['nama'],
                    'logged_in' => true
                ];
                $session->set($userData);
                
                return redirect()->to(base_url('home'));
            }
        }
        return redirect()->to(base_url('login'));
    }

    public function aksi_logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }
}
