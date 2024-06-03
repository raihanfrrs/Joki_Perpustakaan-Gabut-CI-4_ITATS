<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/home', 'PerpustakaanController::tampilkan_halaman_utama');
$routes->get('/koleksi', 'PerpustakaanController::tampilkan_koleksi');
$routes->post('/tambah_data', 'PerpustakaanController::tambah_data');
$routes->post('/hapus', 'PerpustakaanController::hapus');
$routes->post('/ubah', 'PerpustakaanController::pemutahiran');
$routes->get('/kontak', 'PerpustakaanController::tampilkan_halaman_kontak');
$routes->get('/cek_pengguna', 'PerpustakaanController::show_pengguna');
$routes->post('/aksi_login', 'PerpustakaanController::aksi_login');
$routes->get('/login', 'PerpustakaanController::tampilkan_halaman_login');
$routes->get('/logout', 'PerpustakaanController::aksi_logout');
$routes->get('/buku', 'PerpustakaanController::panggil_buku');
