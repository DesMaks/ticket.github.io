<?php
include ('adm.php');
include ('bdConection.php');
$titles = 'Текущие концерты';
include ('header.php');

?>
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


                <div class="users">
                   
                    <img src='http://<?=$row['photo']?>' height=500 width=500 >
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

<?include ('footer.php');?>