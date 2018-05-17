
<?php

include ('bdConection.php');
session_start ();

if (!$_SESSION['admin']) die ( Запрещено );


$zapis = $dbh->query('SELECT * from zayavk ');
if(!$_GET['id'])
    header('Location: /');
?>
<?php foreach($zapis as $row): ?>

<?php endforeach;?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Удаление существующей заявки</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>

<a href=admin_logout.php>Выйти из административной панели</a>








<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";?>
        <td>

            <form name="delete" method="post" action="deleteZayavkiAction.php">
                <input type="hidden" name="ID" value="<?=$_GET['id']?>">
                <label>Удалить выбранную заявку на концерт?<br></form>
         
            <input type="submit" name="submit" id="submit" value="Да"><br><br>
            <form method="get" action="zayavki.php">
                <button type="">Нет</button>
            </form>

        </td>
    </tr>

</table>
</font>
</body>
<html>

