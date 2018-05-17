<?php
include ('bdConection.php');
session_start ();

if (!$_SESSION['admin']) die ( Запрещено );

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Текущие концерты</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>


<a href=admin_logout.php>Выйти из административной панели</a>


<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include 'left.php';?>
        <td>
            <?php
           

            $Koncerid = $dbh->query('SELECT * from zap ');
           
            ?>
            <? foreach($Koncerid as $row): ?>


                <div class="users" style="border: 1px solid #ffde71">

                    <img src='http://<?=$row['photo']?>' heigth=500 width=500 >
                    <div class="text"> Дата проведения концерта: <?= $row['date_concert']?> </div>
                    <div class="text"> Название концерта: <?= $row['title']?> </div>
                    <div class="text">Описание концерта: <?=$row['text']?> </div>
                    <div class="text">Цены билетов:<br> от <?=$row['price_zone1']?> ₽ до <?=$row['price_zone3']?> ₽</div>
                    <a href="edit_zap.php?id=<?=$row['id']?>">Изменить</a>
                    <a href="delete.php?id=<?=$row['id']?>">Удалить</a>

                </div>
            <?php endforeach;?>


        </td>
    </tr>

</table>
</font>
</body>
<html>
