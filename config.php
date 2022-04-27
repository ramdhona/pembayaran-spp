<?php
session_start();

/**
 * using mysqli_connect for database connection
 */

$databaseHost = 'localhost';
$databaseName = 'db_spp';
$databaseUsername = 'root';
$databasePassword = '';
// $basePath = "http://192.168.0.101/php/pembayaran_spp";
$basePath = "http://localhost/php/pembayaran_spp";

$mysqli = mysqli_connect($databaseHost, $databaseUsername, $databasePassword, $databaseName);