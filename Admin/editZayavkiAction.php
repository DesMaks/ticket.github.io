<?php
include ('bdConection.php');
$oplata = $_POST['payed'];
$active=$_POST['active'];
$Cid=$_POST['ID'];


?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <title>Редактирование заявок</title>
    <link rel="stylesheet" href="styles.css" type="text/css"/></head>
<body >

<div class="text">Изменение существующей записи</div>

<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";?>
        <td>


            <?php
          
                    try
                    {

                        $user = "root";
                        $pass = "UdV91SUF";

                        $dbh = new PDO('mysql:host=localhost;dbname=koncerti-db', $user, $pass);
                        $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


                        $Concertid = $dbh->prepare('UPDATE zayavk SET payed = :oplata,active=:active WHERE id=:ID');

                        $Concertid->execute(array(
                            ':ID' => $Cid,
                            ':oplata' => $oplata,
                            ':active' => $active,
                        ));

                        $dbh = null;
                    } catch (PDOException $e) {
                        print "Error!: " . $e->getMessage() . "<br/>";
                        die();
                    }
                    {echo  "<p>Заявка успешно изменена!</p>";}



            ?>

        </td>

</table>
</body>
</html>

