
<?php
include ('adm.php');
include ('bdConection.php');
$titles = 'Изменение существующего концерта';
include ('header.php');
$ID = $_GET['id'];
$zapis = $dbh->prepare(" SELECT *, DATE_FORMAT(date_concert,'%Y-%m-%d  %H:%i') AS date_concert FROM zap WHERE id = :ID");

$zapis->execute(array(
    ':ID' => $ID));
if(!$_GET['id'])

        echo "<script>window.location.href='/'</script>";
$row = $zapis ->fetch();
?>


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
                        <input type="text" name='price1' cols="100" rows="20" value="<?=$row['price_zone1']?>">
                    </label>
                </p>
                <p>
                    <label>Ввеcти цену зоны 2* <br>
                        <input type="text" name='price2' cols="100" rows="20" value="<?=$row['price_zone2']?> ">
                    </label>
                </p>
                <p>
                    <label>Ввеcти цену зоны 3* <br>
                        <input type="text" name='price3' cols="100" rows="20" value="<?=$row['price_zone3']?>">
                    </label>
                </p>

                <p><label>Загрузить изображение <br>
                        <input type="file" name="userfile"">
                </p>
                <p>измените дату и время*:<input type="datetime" name="calendar" value="<?=$row['date_concert']?>"></p>
                <p><label>Ввеcти полное описание концерта*  (не менее 2 символов)<br>

<textarea name="text" ><?=$row['text']?></textarea>
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
<?include ('footer.php');?>






