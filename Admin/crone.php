<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <meta charset="UTF-8">
    <title>crone</title>
    <link rel="stylesheet" href="styles.css" type="text/css"/></head>
<body >

<div class="text">Текущие заявки</div>

<a href=admin_logout.php>Выйти из административной панели</a>
<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">
    <tr>

        <td>

            <?php
            include ('bdConection.php');


            $zapis = $dbh->query('SELECT * from zayavk ORDER BY id');




            ?>
            <?php foreach($zapis as $row):
                $oplt=$row['payed'];

                ?>
                <div class="text"> <?=$row['date_adds']?> </div>
                <div class="text"> <?=$row['payed']?> </div>
                   <?php

                    $putdate = $row['date_adds'];
                    $putdate = (new DateTime( $putdate))->getTimestamp();
                    $today =time();
                   $dates= date('Y-m-d H:i');

                    if(  $oplt <= 0 && $putdate+3600<=$today) {

                        try
                        {

                            $Concertid = $dbh->prepare('DELETE FROM zayavk WHERE id = :ID');

                            $Concertid->execute(array(
                                ':ID' => $row['id'],

                            ));

                            $dbh = null;
                        } catch (PDOException $e) {
                            print "Error!: " . $e->getMessage() . "<br/>";
                            die();
                        }


                    }
                    else
                    {

                    }

                    ?>
                   
                </div>
            <?php endforeach;?>

        </td>
    </tr>

</table>
</body>
</html>
