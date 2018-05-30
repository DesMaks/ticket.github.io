<?php
session_start ();
if (!empty ($_SESSION['admin'])){
    if ($_SESSION['admin']){
        $titles = 'Вход в административную панель';
        include ('header.php');
        ?>


        <body>

        <center>
            <table cellpadding="0" cellspacing= "0" id= "wrap">
                <tr>
                    <td align="center"><table cellpadding="0" cellspacing= "0">
                            <tr>
                                <td class="loginbox1" align="center">Вход выполнен</td>
                            </tr>
                            <tr>
                                <td class="loginbox2" align="center">
                                    <a href="admin_main.php">Перейти к административной панели</a>
                                </td>
                            </tr>
                        </table>
                        </td>
                </tr>
            </table>
        </center>

        <?php

        exit;}
}
 $_SESSION['admin'] = false;

$_SESSION['admin'] = false;
include ('config.php');

function not_logged_in ()
{
    echo include ('indadm.php');
    exit;}
    if (!$_POST || !$_POST['login'] || !$_POST['password'] || $_POST['login'] != $adminlogin || $_POST['password'] != $adminpassw) not_logged_in ();

    $_SESSION['admin'] = true;
?>




<center>
    <table cellpadding="0" cellspacing="0" id="wrap">
        <tr>
            <td align="center">
                <table cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="loginbox1" align="center">Вход выполнен</td>
                    </tr>
                    <tr>
                        <td class="loginbox2" align="center">
                            <a href="admin_main.php">Перейти к административной панели</a>
                        </td>
                    </tr>
                </table>
            </td>
            </tr>
    </table>
</center>

<?include ('footer.php');?>