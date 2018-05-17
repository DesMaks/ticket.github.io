<?php
$user = "root";
$pass = "UdV91SUF";

$dbh = new PDO('mysql:host=localhost;dbname=koncerti-db', $user, $pass);
$dbh->exec("set names utf8")
?>