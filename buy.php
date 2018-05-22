<?include ('header.php');
include('bdConection.php');
?>    <title>Оплата билета на концерт</title>

<?php

$places = $_GET['places'];
$kid = $_GET['kid'];

$arPlaces = explode(';', $places);?>

<body>
<table align="center">
    <tr>
        <td colspan="2" height="50px" valign="top">
            <!--ЛОГО-->
            <div class="header">
                <div class="text" style="padding:3px;">На этой странице вы можете оплатить билет на концерт.</p>
                </div>
        </td>
    </tr>
    <tr>
        <td valign="top" align="center"><br>
            <?php

    $places = $_GET['places'];
    $kid = $_GET['kid'];
    $price = $_GET['price'];
    $arPlaces = explode(';', $places);
    $zapisi = $dbh->query('SELECT * from zap WHERE id=' . $_GET['kid']);
            $name = $zapisi->fetch(PDO::FETCH_BOTH);
    echo ' <div class="koncerts">', "Название концерта: ", $name['title'], '<br>';
    foreach ($arPlaces as $place) {
        $place = explode(',', $place);
        $row = $place[0];
        $col = $place[1];

        echo "Ряд " . $row . " место " . $col . '<br>';
    }
    ?>

        <form action="paying.php" method="POST" onsubmit="if (this.email.value == ' Ваш Email') { alert('Вы не ввели Email'); return false; }">
            <input name="email" type="email" value=" Ваш Email" onblur="if(this.value=='') this.value='Ваш Email';" onfocus="if(this.value=='Ваш Email') this.value='';">
            <input type="hidden" name ="places" value="<?=$places?>">
            <input type="hidden" name ="koncert_id" value="<?=$kid?>"><br>
            <input type="hidden" name ="name_concert" value="<?=$name['title']?>"><br>
            <span class="span">Итого к оплате: <?echo $price?> ₽</span><br>
         
        <input type="radio" name="oplata" value="1">Оплатить<br>
        <input type="radio" name="oplata" value="0" checked>Не оплачивать<br>
        <input type="submit" name="sub" value="Подтвердить">

    </form>
</td>
        </tr>
    </table>

</center>
<?include ('footer.php')?>