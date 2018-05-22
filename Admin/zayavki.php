<?php
include ('adm.php');
include('header.php');
include ('bdConection.php');
?>
    <title>Pay ticket</title>
<body >

<div class="text">Текущие заявки</div>

<a href=admin_logout.php>Выйти из административной панели</a>
<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">
    <tr>
        <?php include "left.php";?>
        <td>

<?php

$zapis = $dbh->query('SELECT * from zayavk ORDER BY id');

?>
<?php foreach($zapis as $row):
    $oplt = $row['payed'];
    $active = $row['active']?>

    <div class="zayavki" style="border: 1px solid #ffde71">



        <div class="text">Оплачено: <? echo ($oplt <= 0 ? 'Нет' : 'Да');?> </div>
        <div class="text">Активен: <? echo ($active <= 0 ? 'Нет' : 'Да');?> </div>
        <div class="text">Ряд, место: <?=$row['places']?> </div>
        <a href="edit_zayavki.php?id=<?=$row['id']?>">Изменить</a>
        <a href="deleteZayavki.php?id=<?=$row['id']?>">Удалить</a>
        </div>
<?php endforeach;?>

        </td>
    </tr>

</table>
<?php
include ('header.php');?>