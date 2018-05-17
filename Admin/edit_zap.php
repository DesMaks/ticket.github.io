
<?php
session_start ();
include ('bdConection.php');
if (!$_SESSION['admin']) die ( Запрещено );



$zapis = $dbh->query('SELECT * from zap WHERE id = ' . $_GET["id"]);

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

    <title>Изменение существующего концерта</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>
<a href=admin_logout.php>Выйти из административной панели</a>
<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";?>
        <td>

            <form name="editForm" method="post" action="editAction.php" ENCTYPE="multipart/form-data">
                <input type="hidden" name="ID" value="<?=$_GET['id']?>">
                <p>
                    <label>Ввеcти название концерта* (не менее 2 символов) <br>
                        <input type="text" name='title' value="<?=$row ['title']?> ">
                    </label>
                </p>

                <p>
                    <label>Ввеcти цену зоны 1* <br>
                        <input type="text" name='price1' cols="100" rows="20" value="<?=$row['price_zone1']?> ₽">
                    </label>
                </p>
                <p>
                    <label>Ввеcти цену зоны 2* <br>
                        <input type="text" name='price2' cols="100" rows="20" value="<?=$row['price_zone2']?> ₽">
                    </label>
                </p>
                <p>
                    <label>Ввеcти цену зоны 3* <br>
                        <input type="text" name='price3' cols="100" rows="20" value="<?=$row['price_zone3']?> ₽">
                    </label>
                </p>

                <p><label>Загрузить изображение <br>
                        <input type="file" name="userfile"">
                </p>
                <p>Выберите дату и время*:<input type="datetime-local" name="calendar" ></p>
                <p><label>Ввеcти полное описание концерта*  (не менее 2 символов)<br>

                        
                        <input type="text" name='text' cols="100" rows="20" value="<?=$row['text']?>">
                    </label></p>
                <p> <label>
                        <input type="submit" name="submit" id="submit" value="Редактировать">


                    </label>
                </p>
                <p> <label>
                        Поля помеченые "*" обязательны для заполнения
                    </label>
                </p>
            </form>
        </td>
    </tr>

</table>
</font>
</body>
<html>






