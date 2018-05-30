<?php
include ('adm.php');
include "bdConection.php";
$titles = 'Редактирование заявок';
include "header.php";
$oplata = $_POST['payed'];
$active = $_POST['active'];
$Cid = $_POST['ID'];
?>

    
<body >

<div class="text">Изменение существующей записи</div>

<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";?>
        <td>


            <?php
           
                    try
                    {
                        
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
</tr>
</table>
<?include ('footer.php');?>

