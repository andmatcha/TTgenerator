<?php
$dsn = 'mysql:host=db;dbname=webapp;charset=utf8';
$user = 'root';
$password = 'secret';

$db = new PDO($dsn, $user, $password);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
