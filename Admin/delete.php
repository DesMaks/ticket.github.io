
<?php

include ('bdConection.php');
session_start ();

if (!$_SESSION['admin']) die ( Запрещено );


$zapis = $dbh->query('SELECT * from zap ');
if(!$_GET['id'])
    header('Location: /');
?>
<?php foreach($zapis as $row): ?>

<?php endforeach;?>



<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN">
<html>
<head>
    <title>Удаление существующего концерта</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>

<a href=admin_logout.php>Выйти из административной панели</a>








<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";?>
        <td>

            <form name="delete" method="post" action="deleteAction.php ">
                <input type="hidden" name="ID" value="<?=$_GET['id']?>">
                <label>Удалить выбранную запись?<br></form>

                <input type="submit" name="submit" id="submit" value="Да"><br><br>
                    <form method="get" action="admin_main.php">
                        <button type="submit">Нет</button>
                    </form>

        </td>
    </tr>

</table>
</font>
</body>
<html>






