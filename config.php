<?php

/* 

 # KONFIGURASI

*/

date_default_timezone_set( 'Asia/Jakarta' );

error_reporting( 0 );

// ======++ Koneksi Ke Database ++=======//

$dbase = [

	'server' => 'localhost',  // Server database	
  
  'name' => '',  // Nama database

	'user' => '',  // Username database

	'pass' => ''  // Password database

];

$db = mysqli_connect( $dbase['server'], $dbase['user'], $dbase['pass'], $dbase['name'] );

// Jika koneksi gagal

if( mysqli_connect_error() ) {

	die('Gagal terkoneksi dengan database!');

}

// ======++ Koneksi Ke Database ++=======//

// ======++ Waktu ++====== //

$date = date("Y-m-d");

$datetime = date("Y-m-d H:i:s");

$time = date("H:i:s");

// ======++ Waktu ++====== //

// ======++ Included File Function ++===== //

require 'envaya_class.php';  // Class envaya SMS

require 'function.php';  // File function

// ======++ Included File Function ++===== //

// ======++ ENVAYA SMS ++====== //

$PASSWORD = ''; // Password envaya SMS mu

$AMQP_SETTINGS = array(

    'host' => 'localhost',

    'port' => 5672,

    'user' => '',  // User AMPQ Envaya

    'password' => '',  // Password AMPQ Envaya

    'vhost' => '/',

    'queue_name' => "envayasms"

);

// ======++ ENVAYA SMS ++====== //
