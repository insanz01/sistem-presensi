<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/*
| -------------------------------------------------------------------------
| URI ROUTING
| -------------------------------------------------------------------------
| This file lets you re-map URI requests to specific controller functions.
|
| Typically there is a one-to-one relationship between a URL string
| and its corresponding controller class/method. The segments in a
| URL normally follow this pattern:
|
|	example.com/class/method/id/
|
| In some instances, however, you may want to remap this relationship
| so that a different class/function is called than the one
| corresponding to the URL.
|
| Please see the user guide for complete details:
|
|	https://codeigniter.com/userguide3/general/routing.html
|
| -------------------------------------------------------------------------
| RESERVED ROUTES
| -------------------------------------------------------------------------
|
| There are three reserved routes:
|
|	$route['default_controller'] = 'welcome';
|
| This route indicates which controller class should be loaded if the
| URI contains no data. In the above example, the "welcome" class
| would be loaded.
|
|	$route['404_override'] = 'errors/page_missing';
|
| This route will tell the Router which controller/method to use if those
| provided in the URL cannot be matched to a valid route.
|
|	$route['translate_uri_dashes'] = FALSE;
|
| This is not exactly a route, but allows you to automatically route
| controller and method names that contain dashes. '-' isn't a valid
| class or method name character, so it requires translation.
| When you set this option to TRUE, it will replace ALL dashes in the
| controller and method URI segments.
|
| Examples:	my-controller/index	-> my_controller/index
|		my-controller/my-method	-> my_controller/my_method
*/
$route['default_controller'] = 'AppController/index';
$route['404_override'] = 'ErrorController/not_found';
$route['translate_uri_dashes'] = FALSE;

$route['auth'] = "AuthController/index";
$route['auth/login'] = "AuthController/index";
$route['auth/do_login'] = "AuthController/do_login";
$route['auth/logout'] = "AuthController/do_logout";

$route['dashboard'] = "AppController/index";

// KARYAWAN
$route['karyawan'] = "KaryawanController/index";
$route['karyawan/add'] = "KaryawanController/add";
$route['karyawan/do_add'] = "KaryawanController/do_add";
$route['karyawan/edit/(:any)'] = "KaryawanController/edit/$1";
$route['karyawan/do_edit/(:any)'] = "KaryawanController/do_edit/$1";
$route['karyawan/delete/(:any)'] = "KaryawanController/delete/$1";

// PRESENSI
$route['presensi'] = "AppController/presensi";

$route['presensi/pns'] = "PresensiController/index";
$route['presensi/pns/add'] = "PresensiController/add";
$route['presensi/pns/do_add'] = "PresensiController/do_add";
$route['presensi/pns/edit/(:any)'] = "PresensiController/edit/$1";
$route['presensi/pns/do_edit/(:any)'] = "PresensiController/do_edit/$1";
$route['presensi/pns/delete'] = "PresensiController/delete";

$route['presensi/honorer'] = "PresensiController/index_honorer";
$route['presensi/honorer/add'] = "PresensiController/add_honorer";
$route['presensi/honorer/do_add'] = "PresensiController/do_add_honorer";
$route['presensi/honorer/edit/(:any)'] = "PresensiController/edit_honorer/$1";
$route['presensi/honorer/do_edit/(:any)'] = "PresensiController/do_edit_honorer/$1";
$route['presensi/honorer/delete/(:any)'] = "PresensiController/delete_honorer/$1";

$route['presensi/magang'] = "PresensiController/index_magang";
$route['presensi/magang/add'] = "PresensiController/add_magang";
$route['presensi/magang/do_add'] = "PresensiController/do_add_magang";
$route['presensi/magang/edit/(:any)'] = "PresensiController/edit_magang/$1";
$route['presensi/magang/do_edit/(:any)'] = "PresensiController/do_edit_magang/$1";
$route['presensi/magang/delete/(:any)'] = "PresensiController/delete_magang/$1";

// LEMBUR
$route['lembur/pns'] = "LemburController/index";
$route['lembur/pns/add'] = "LemburController/add";
$route['lembur/pns/do_add'] = "LemburController/do_add";
$route['lembur/pns/edit/(:any)'] = "LemburController/edit/$1";
$route['lembur/pns/do_edit/(:any)'] = "LemburController/do_edit/$1";
$route['lembur/pns/delete'] = "LemburController/delete";

$route['lembur/honorer'] = "LemburController/index_honorer";
$route['lembur/honorer/add'] = "LemburController/add_honorer";
$route['lembur/honorer/do_add'] = "LemburController/do_add_honorer";
$route['lembur/honorer/edit/(:any)'] = "LemburController/edit_honorer/$1";
$route['lembur/honorer/do_edit_honorer/(:any)'] = "LemburController/do_edit/$1";
$route['lembur/honorer/delete'] = "LemburController/delete_honorer";

$route['lembur/magang'] = "LemburController/index_magang";
$route['lembur/magang/add'] = "LemburController/add_magang";
$route['lembur/magang/do_add'] = "LemburController/do_add_magang";
$route['lembur/magang/edit/(:any)'] = "LemburController/edit_magang/$1";
$route['lembur/magang/do_edit_magang/(:any)'] = "LemburController/do_edit/$1";
$route['lembur/magang/delete'] = "LemburController/delete_magang";

$route['lembur/status/(:any)/(:any)/(:any)'] = "LemburController/status/$1/$2/$3";

// GAJI
$route['gaji'] = "GajiController/index";

$route['na/presensi'] = "NonAdminController/presensi";
$route['na/do_presensi'] = "NonAdminController/do_presensi";
$route['na/ajukan_lembur'] = "NonAdminController/ajukan_lembur";
$route['na/do_ajukan_lembur'] = "NonAdminController/do_ajukan_lembur";

$route['setting/jadwal'] = "SettingController/jadwal";
$route['setting/jadwal/pns'] = "SettingController/jadwal_pns";
$route['setting/jadwal/honorer'] = "SettingController/jadwal_honorer";
$route['setting/jadwal/gaji'] = "SettingController/gaji";
$route['setting/jadwal/jabatan'] = "SettingController/jabatan";

$route["print/presensi"] = "PrintController/presensi";
$route["print/presensi/magang"] = "PrintController/presensi_magang";

$route["print/lembur/pns"] = "PrintController/lembur_pns";
$route["print/lembur/honorer"] = "PrintController/lembur_honorer";

$route['print/gaji'] = "PrintController/gaji";

$route["api/gaji/(:any)"] = "APIController/golongan_gaji/$1";
$route["api/jabatan/(:any)"] = "APIController/jabatan_tunjangan/$1";