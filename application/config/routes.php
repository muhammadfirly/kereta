<?php
defined('BASEPATH') or exit('No direct script access allowed');

$route['kirimKonfirmasi'] = 'guest/kirimKonfirmasi';
$route['cekKonfirmasi'] = 'guest/cekKonfirmasi';

$route['pembayaran'] = 'Guest/keHalamanPembayaran';
$route['pesanTiket'] = 'Guest/pesanTiket';
$route['pesan/(:any)'] = 'Guest/pesan/$1';

$route['editJadwal'] = 'admin/edit_jadwal';
$route['admin/dashboard/edit-jadwal/(:any)'] = 'admin/keHalamanEditJadwal/$1';
$route['hapusJadwal/(:any)'] = 'Admin/hapusJadwal/$1';
$route['tambahJadwal'] = 'Admin/tambah_jadwal';
$route['admin/dashboard/kelola-jadwal'] = 'admin/keHalamanKelolaJadwal';

$route['cariTiket'] = 'guest/cari_tiket';

$route['editStasiun'] = 'admin/edit_stasiun';
$route['admin/dashboard/edit/(:any)'] = 'admin/keHalamanEditStasiun/$1';
$route['hapusStasiun/(:any)'] = 'admin/hapus_stasiun/$1';
$route['tambahStasiun'] = 'admin/tambah_stasiun';
$route['admin/dashboard'] = 'admin/keHalamanDashboard';

$route['logout'] = 'admin/logout';
$route['prosesLogin'] = 'admin/Login';
$route['login'] = 'admin/keHalamanLogin';

$route['konfirmasi'] = 'guest/keHalamanKonfirmasi';
$route['default_controller'] = 'guest/keHalamanDepan';


$route['404_override'] = '';
$route['translate_uri_dashes'] = FALSE;