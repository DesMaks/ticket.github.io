<?php
session_start ();

if (!$_SESSION['admin']) die ( "Вход запрещен, необходима авторизация администратора.");
?>