<?php 

// $url = $_SERVER['REQUEST_URI'];
// $path = basename(parse_url($url, PHP_URL_PATH));

$routes = [];

$routes['GET']['/'] = 'AutentikasiController@landingpage';
$routes['GET']['/login'] = 'AutentikasiController@index';
$routes['POST']['/login'] = 'AutentikasiController@login';

// Rute untuk mahasiswa
$routes['GET']['/dashboard'] = 'MahasiswaController@dashboard';
$routes['GET']['/mahasiswacreate'] = 'MahasiswaController@formcreate';
$routes['GET']['/mahasiswaupdate/{id}'] = 'MahasiswaController@formupdate';
$routes['POST']['/createmahasiswa'] = 'MahasiswaController@create';
$routes['POST']['/updatemahasiswa/{id}'] = 'MahasiswaController@update';
$routes['GET']['/deletemahasiswa/{id}'] = 'MahasiswaController@delete';


?>