<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Концертный зал</title>
    <link rel="stylesheet" href="style.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="scripts.js"></script>

</head>
<?php
include('bdConection.php');


$zapisi = $dbh->query('SELECT * from zap WHERE id=' . $_GET['kid']);


$all= $zapisi->fetch();



$zayavki = $dbh->query('SELECT * FROM `zayavk` WHERE `koncert_id`=' . $_GET['kid']);


$arrayBoughtPlaces = [];

while ($zayavka = $zayavki->fetch()) {
    $arPlaces = explode(';', $zayavka['places']);

    foreach ($arPlaces as $arPlace) {
        $arrayBoughtPlaces[] = $arPlace;
    }
}

?>
<body>
<table align="center">
    <tr>
        <td colspan="2" height="50px" valign="top">
            <!--ЛОГО-->
            <div class="header">
                <div class="text" style="padding:3px;">Выбор места на концерт "<?= $all['title'] ?>".

                </div>
        </td>
    </tr>
    <tr>
        <td valign="top" align="center"><br>
            <div class="scene">
                Сцена
            </div>



            <div class="hall">
                <? for ($row = 1; $row <= 15; $row++): ?>
                    <?
                    $priceZone = 1;
                    if ($row > 10) {
                        $priceZone = 3;
                    } else if ($row > 5) {
                        $priceZone = 2;
                    }
                    ?>

                    <div class="hall-row_red"> Ряд <?= $row ?>
                        <? for ($col = 1; $col <= 20; $col++): ?>
                            <?
                            $place = $row . "," . $col;
                            ?>
                            <div
                                data-row=<?= $row ?>
                                data-col=<?= $col ?>
                                data-price="<?= $all['price_zone' . $priceZone] ?>"
                                class="hall-place <?= (in_array($place, $arrayBoughtPlaces)) ? "bought" : "" ?>">
                                <?= $col ?>
                            </div>
                        <? endfor ?>
                    </div>
                <? endfor ?>

            </div>

            <div class='button'>
                <button id="buy" class="button" data-href="buy.php" data-kid="<?= $_GET['kid'] ?>">Купить</button>
            </div>

        </td>
        <td width="200px" valign="top"><br>
            <div >
                <div class="header"> Название концерта: <?= $all['title'] ?> <br>
                    Описание:<br> <?= $all['text'] ?> </div>    
                <table>
                    <tr>
                        <td>Ряд с 1 по 5</td>
                        <td><div class="hall-place_fqred"><?= $all['price_zone1'] ?> ₽</div></td>
                    </tr>
                    <tr>
                        <td>Ряд с 6 по 10</td>
                        <td> <div class="hall-place_fqred"><?= $all['price_zone2'] ?> ₽</div></td>
                    </tr>
                    <tr>
                        <td>Ряд с 11 по 15</td>
                        <td><div class="hall-place_fqred"><?= $all['price_zone3'] ?> ₽</div></td>
                    </tr>
                    <tr>
                        <td><div class="hall-place">Сво<br>бодно</div></td>
                        <td> <div class="hall-place bought">Бронь</div></td>
                    </tr>
                    <tr>

                        <td> <span  class="span" >Сумма:  </span>  <span id="full-price" class="span"> 0 ₽</span></td>
                    </tr>

                </table>
            </div>
        </td>
    </tr>
</table>
</body>
</html>
