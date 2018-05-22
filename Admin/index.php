<?php session_start ();
if (!empty ($_SESSION['admin'])){
    if ($_SESSION['admin']){
        include ('header.php');
        ?>


            <title>Вход в административную панель</title>


        <center>
            <table cellpadding=0 cellspacing= «0» id= «wrap»>
                <tr>
                    <td align=center><table cellpadding=0 cellspacing= «0»>
                            <tr>
                                <td class=loginbox1 align=center>Вход выполнен</td>
                            </tr>
                            <tr>
                                <td class=loginbox2 align=center>
                                    <a href=admin_main.php>Перейти к административной панели</a>
                                </td>
                            </tr>
                        </table>
                        </td>
                </tr>
            </table>
        </center>

        <?php
        include ('footer.php');
        exit;}
}
$_SESSION['admin'] = false;
include ('config.php');
include ('header.php');
function not_logged_in ()
{echo include ('indadm.php');
    exit;}
if (!$_POST) not_logged_in ();
if (!$_POST['login']) not_logged_in ();
if (!$_POST['password']) not_logged_in ();
if ($_POST['login'] != $adminlogin) not_logged_in ();
if ($_POST['password'] != $adminpassw) not_logged_in ();
$_SESSION['admin'] = true;
include ('header.php')?>
    
    <title>Административная панель</title>
   
<body>
<center>
    <table cellpadding=0 cellspacing=0 id=wrap>
        <tr>
            <td align=center>
                <table cellpadding=0 cellspacing=0>
                    <tr>
                        <td class=loginbox1 align=center>Вход выполнен</td>
                    </tr>
                    <tr>
                        <td class=loginbox2 align=center>
                            <a href=admin_main.php>Перейти к административной панели</a>
                        </td>
                    </tr>
                </table>
            </td>
            </tr>
    </table>
</center>

<?include ('footer.php');?>