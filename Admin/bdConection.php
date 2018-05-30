<?php

$host = 'localhost';
$db   = 'koncerti-db';
$user = 'root';
$pass = 'UdV91SUF';
$charset = 'utf8';

$pdo = "mysql:host=$host;dbname=$db;charset=$charset";
$dbh = new PDO($pdo, $user, $pass);?>

