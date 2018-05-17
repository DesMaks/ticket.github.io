
<?php
include ('bdConection.php');
session_start ();

if (!$_SESSION['admin']) die ( Запрещено );

$zayavki = $dbh->query('SELECT * from zayavk WHERE id = ' . $_GET["id"]);

if(!$_GET['id'])
    header('Location: /');



?>
<?php foreach($zayavki as $row): ?>

<?php endforeach;?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Изменение существующей заявки</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>
<a href=admin_logout.php>Выйти из административной панели</a>
<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";
        $oplt=$row['payed'];
        $active=$row['active']?>
        <td>

            <form name="editZayavkiForm" method="post" action="editZayavkiAction.php">
                <input type="hidden" name="ID" value="<?=$_GET['id']?>">
                <p>
                    <label>Изменить статус активности заявки*<br>
                        <? echo ($oplt <= 0 ? '<input type="radio" name="payed" value="1">Активен<br>' : '<input type="radio" name="payed" value="0">Не активен<br>');?> </div>
                    </label>
                </p>

                <p>
                    <label>Изменить статус оплаты заявки* <br>
                        <div class="">Активен: <? echo ($active <= 0 ? 'Нет' : 'Да');?> </div>
                         <? echo ($active <= 0 ? '<input type="radio" name="active" value="1">Оплачено<br>' : '<input type="radio" name="active" value="0">Не оплачено<br>');?> </div>


                    </label>
                </p>
                <p> <label>
                        <input type="submit" name="submit" id="submit" value="Редактировать">
                       

                    </label>
                </p>
                <p> <label>
                        Поля помеченые * обязательны для заполнения
                    </label>
                </p>
            </form>
        </td>
    </tr>

</table>
</font>
</body>
<html>






