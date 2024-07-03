<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  routes dompet
$routes->get('/', 'Dompet::index');
$routes->get('/dompet/tambah', 'Dompet::tambah');
$routes->post('/dompet/proses-tambah', 'Dompet::addproses');
$routes->post('/dompet/proses-update', 'Dompet::updateproses');
$routes->post('/dompet/proses-update-saldo', 'Dompet::updateprosessaldo');
$routes->get('/dompet/detail/(:num)', 'Dompet::detail/$1');
$routes->get('/dompet/detail/edit-dompet/(:num)', 'Dompet::editdompet/$1');
$routes->get('/dompet/detail/edit-saldo/(:num)', 'Dompet::editsaldo/$1');
$routes->get('/dompet/detail/hapus-dompet/(:num)', 'Dompet::deleteproses/$1');
$routes->post('/dompet/datajson', 'Dompet::dataDompet');

// routes kebutuhan
$routes->get('/kebutuhan/tambah', 'Kebutuhan::tambah');
$routes->post('/kebutuhan/proses-tambah', 'Kebutuhan::addproses');
$routes->get('/kebutuhan/proses-update-json/(:num)/(:num)', 'Kebutuhan::updateprosesjson/$1/$2');
$routes->post('/kebutuhan/coba', 'Kebutuhan::cobapost');
$routes->post('/kebutuhan/proses-checked', 'Kebutuhan::checkedproses');
$routes->get('/kebutuhan', 'Kebutuhan::index');
$routes->get('/kebutuhan/update/(:num)', 'Kebutuhan::update/$1');
$routes->post('/kebutuhan/proses-update', 'Kebutuhan::updateproses');
$routes->get('/kebutuhan/hapus/(:num)', 'Kebutuhan::deleteproses/$1');
$routes->post('/kebutuhan/proses-done', 'Kebutuhan::doneproses');

// target
$routes->get('/target', 'Target::index');
$routes->get('/target/tambah', 'Target::tambah');
$routes->post('/target/proses-tambah', 'Target::addproses');
$routes->post('/target/proses-checked', 'Target::checkedproses');
$routes->get('/target/update/(:num)', 'Target::update/$1');
$routes->post('/target/proses-update', 'Target::updateproses');
$routes->get('/target/hapus/(:num)', 'Target::deleteproses/$1');
$routes->post('/target/proses-done', 'Target::doneproses');

// logaktivitas
$routes->get('/riwayat/tambah', 'Logaktivitas::tambah');
$routes->post('/riwayat/proses-tambah', 'Logaktivitas::addproses');
$routes->get('/riwayat/update/(:num)', 'Logaktivitas::update/$1');
$routes->post('/riwayat/proses-update', 'Logaktivitas::updateproses');
$routes->post('/riwayat/proses-pemasukan', 'Logaktivitas::addpemasukan');
$routes->post('/riwayat/proses-transfer', 'Logaktivitas::addtransfer');
$routes->get('/riwayat/log-filter/(:segment)/(:segment)', 'Logaktivitas::logFilter/$1/$2');
$routes->get('/riwayat/log-detail/(:segment)', 'Logaktivitas::logDetail/$1');
$routes->post('/riwayat/hapus', 'Logaktivitas::deleteproses');


// periode
$routes->get('/periode', 'Penghitungp::index');
$routes->get('/periode/tambah', 'Penghitungp::tambah');
$routes->post('/periode/proses-tambah', 'Penghitungp::addproses');
$routes->get('/periode/update/(:num)', 'Penghitungp::update/$1');
$routes->post('/periode/proses-update', 'Penghitungp::updateproses');
$routes->get('/periode/hapus/(:num)', 'Penghitungp::deleteproses/$1');
$routes->post('/periode/proses-done', 'Penghitungp::doneproses');


// penggunaan
$routes->get('/penggunaan', 'Penggunaanl::index');
$routes->get('/penggunaan/tambah', 'Penggunaanl::tambah');
$routes->post('/penggunaan/proses-tambah', 'Penggunaanl::addproses');
$routes->get('/penggunaan/update/(:num)', 'Penggunaanl::update/$1');
$routes->post('penggunaan/proses-update', 'Penggunaanl::updateproses');
$routes->get('/penggunaan/hapus/(:num)', 'Penggunaanl::deleteproses/$1');
$routes->post('/penggunaan/proses-done', 'Penggunaanl::doneproses');


// rencana
$routes->get('/rencana', 'Rencana::index');
$routes->get('/rencana/tambah', 'Rencana::tambah');
$routes->post('/rencana/proses-tambah', 'Rencana::addproses');
$routes->get('/rencana/update/(:num)', 'Rencana::update/$1');
$routes->post('/rencana/proses-update', 'Rencana::updateproses');
$routes->get('/rencana/hapus/(:num)', 'Rencana::deleteproses/$1');

// to do list
$routes->post('/todolist/proses-tambah', 'Todolist::addproses');
$routes->get('/todolist/update/(:segment)', 'Todolist::update/$1');
$routes->post('/todolist/proses-update', 'Todolist::updateproses');
$routes->get('/todolist/hapus/(:segment)', 'Todolist::deleteproses/$1');


// piutang
$routes->get('/piutang', 'Piutang::index');
$routes->get('/piutang/tambah', 'Piutang::tambah');
$routes->post('/piutang/proses-tambah', 'Piutang::addproses');
$routes->get('/piutang/update/(:any)', 'Piutang::update/$1');
$routes->post('/piutang/proses-update', 'Piutang::updateproses');
$routes->get('/piutang/detail/(:any)', 'Piutang::detail/$1');
$routes->get('/piutang/tambah-detail/(:any)', 'Piutang::tambahDetail/$1');
$routes->post('/piutang/cicil','Piutang::cicilan');
$routes->get('/piutang/cicilan/(:segment)', 'Piutang::piutang/$1');
$routes->get('/piutang/orang-utang/(:segment)', 'Piutang::orangutang/$1');
$routes->get('/piutang/verify-lunas/(:segment)', 'Piutang::piutanglunas/$1');
// $routes->get('/piutang/coba','Piutang::piutangcoba');

// inventory
$routes->get('/inventory', 'Inventory::index');
$routes->get('/inventory/tambah', 'Inventory::tambah');
$routes->post('/inventory/proses-tambah', 'Inventory::addproses');
$routes->get('/inventory/update/(:segment)', 'Inventory::update/$1');
$routes->post('/inventory/proses-update', 'Inventory::updateproses');
$routes->get('/inventory/proses-delete/(:segment)', 'Inventory::deleteproses/$1');
$routes->get('/inventory/proses/(:segment)', 'Inventory::proses/$1');
// inventory->kebutuhan
$routes->post('/inventory/proses-addkebutuhan', 'Inventory::addkebutuhan');


// user
$routes->get('/user', 'User::index');
$routes->get('/user/pengaturan', 'User::settings');
// gaji
$routes->get('/user/gaji/input-gaji', 'Gaji::index');
$routes->post('/user/gaji/proses-tambah', 'Gaji::addproses');
$routes->get('/user/gaji/update/(:segment)', 'Gaji::update/$1');
$routes->post('/user/gaji/proses-update', 'Gaji::updateproses');
$routes->get('/user/gaji/delete/(:segment)', 'Gaji::deleteproses/$1');
$routes->post('/user/gaji/gaji-bulanan', 'Gaji::addriwayatgaji');

// kategori
$routes->get('/kategori', 'Kategori::index');
$routes->get('/kategori/tambah', 'Kategori::tambah');
$routes->post('/kategori/proses-tambah', 'Kategori::addproses');
$routes->get('/kategori/update/(:segment)', 'Kategori::update/$1');


// api (batal)
$routes->get('/dompet/data-piutang/(:segment)', 'Dompet::dataPiutang/$1');
$routes->get('/dompet/data-cicilan/(:segment)', 'Dompet::dataCicilan/$1');
$routes->get('/dompet/data-dompet/(:segment)', 'Dompet::idDompet/$1');

// api lain
$routes->get('/todo/data-list', 'Todolist::datalist');

// kalendar
$routes->get('/calendar', 'Todolist::calendar');


// coba
$routes->get('/coba', 'Coba::index');
$routes->get('/coba/filterlog/(:segment)/(:segment)', 'Coba::filterLog/$1/$2');
$routes->get('/coba/detaillog/(:segment)', 'Coba::detaillog/$1');

// auth
$routes->get('/login', 'User::login');
$routes->get('/register', 'User::daftar');
$routes->get('/logout', 'User::logout');