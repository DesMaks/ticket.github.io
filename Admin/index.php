<?php session_start ();
if (!empty ($_SESSION['admin'])){
    if ($_SESSION['admin']){
        ?>
        <html>
        <head>
            <title>Вход в административную панель</title>
            <link href="styles.css" type="text/css" rel="stylesheet">
            <style type= text/css>
                #wrap{
                    width: 100%;
                    height: 100%;
                }
                .loginbox1{
                    width: 300px;
                    padding: 4px;
                    border: 1px solid #777;
                    background-color: #777;
                    color: white;
                    font-weight: bold;
                }
                .loginbox2{
                    width: 300px;
                    padding: 4px;
                    border: 1px solid #777;
                    color: #777;
                }
            </style>
        </head>
        <body>
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
        </body>
        </html>
        <?php exit;}
}
$_SESSION['admin'] = false;
include ('config.php');
function not_logged_in ()
{echo '<html>
<head>
<title>Административная панель</title>
 <link href="style.css" type="text/css" rel="stylesheet">
<style type=text/css>
#wrap{
width: 100%;
height: 100%;
}
#wraptd{
padding: 20px;
}
.loginbox1{
width: 300px;
padding: 4px;
border: 1px solid #777;
background-color: #777;
color: white;
font-weight: bold;
}
.loginbox2{
width: 300px;
padding: 4px;
border: 1px solid #777;
color: #777;
}
.loginbox2 input{
width: 200px;
margin: 3px 0;
border-color: #888;
color: #777;
}
</style>
</head>
<body>
<center>
<table cellpadding=0 cellspacing=0 id=wrap>
<tr>
<td align=center id=wraptd><table cellpadding=0 cellspacing=0>
<tr>
<td class=loginbox1 align=center>Вход в административную панель</td>
</tr>
<tr>
<td class=loginbox2 align=center>
<form action=index.php method=post>
<label>введите логин</label>
<input type=text name=login>
<br><label>введите пароль</label>
<input type=password name=password>
<br>
<input type=submit value=Войти>
</form>
</td></tr>
</table>
</td>
</tr>
</table>
</center>
</body>
</html>';
    exit;}
if (!$_POST) not_logged_in ();
if (!$_POST['login']) not_logged_in ();
if (!$_POST['password']) not_logged_in ();
if ($_POST['login']!= $adminlogin) not_logged_in ();
if ($_POST['password']!= $adminpassw) not_logged_in ();
$_SESSION['admin'] = true;
?>
<html>
<head>
    <title>Административная панель</title>
    <link href="styles.css" type="text/css" rel="stylesheet">
    <style type=text/css>
        #wrap{width: 100%;
            height: 100%;
        }
        .loginbox1{
            width: 300px;
            padding: 4px;
            border: 1px solid #777;
            background-color: #777;
            color: white;f
        ont-weight: bold;
        }
        .loginbox2{
            width: 300px;
            padding: 4px;
            border: 1px solid #777;
            color: #777;
        }
    </style>
</head>
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
                        </td></tr></table></td></tr></table></center></body></html>

