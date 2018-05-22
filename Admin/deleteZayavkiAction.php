<?php
include ('adm.php');
include ('bdConection.php');
include ('header.php');
$Cid = $_POST['ID'];
?>
<title>Удаление существующей заявки</title>
<body >
<div class="text">Удаление существующей заявки</div>
<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">
    <tr>
        <?php include "left.php";?>
        <td>

            <?php

            try
            {
                $dbh->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $Concertid = $dbh->prepare('DELETE FROM zayavk WHERE id = :ID');

                $Concertid->execute(array(
                    ':ID' => $Cid,
                ));

                $dbh = null;
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            {echo  "<p>Заявка успешно удалена!</p>";}
            
            ?>
        </td>
</tr>
</table>
<?include ('footer.php');?>

