<?php
$dsn = 'mysql:host=db;dbname=tt;charset=utf8';
$user = 'root';
$password = 'secret';

$db = new PDO($dsn, $user, $password, [
  PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
  PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
]);
