<!DOCTYPE HTML>
<html>
<head>
    <title>Главная</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table align="center">
    <tr>
        <td colspan="2" height="50px" valign="top">
            <!--ЛОГО-->
            <div class="header">
                <div class="text" style="padding:3px;">Все концерты.
                   
            </div>
        </td>
    </tr>
    <tr>
        <td valign="top" align="center"><br>
            <?php
            include('bdConection.php');

            $zapis = $dbh->query('SELECT * from zap ORDER BY date_concert');



             foreach ($zapis as $rows): ?>

                <div class="koncerts">

                    <img src='http://<?= $rows['photo'] ?>' heigth=500 width=500>
                    <div class="text"> Дата проведения концерта: <?= $rows['date_concert'] ?> </div>
                    <div class="text"> Название концерта: <?= $rows['title'] ?> </div>
                    <div class="text">Описание концерта: <?= $rows['text'] ?> </div>

                    <?php
                    $zayavki = $dbh->query('SELECT * FROM `zayavk` WHERE `koncert_id`=' . $rows['id']);
                    $buyedPlaces = [];
                    foreach ($zayavki as $mest) {
                        $buyedPlaces = array_merge($buyedPlaces, explode(';', $mest['places']));
                    }
                    $zone1_occupied_places = 0;
                    $zone2_occupied_places = 0;
                    $zone3_occupied_places = 0;

                    for ($row = 1; $row <= 15; $row++) {
                        for ($col = 1; $col <= 15; $col++) {
                            $place = "$row,$col";
                            foreach ($buyedPlaces as $buyedPlace) {
                                if ($buyedPlace == $place) {
                                    if ($row <= 5) {
                                        $zone1_occupied_places++;
                                    } elseif ($row <= 10) {
                                        $zone2_occupied_places++;
                                    } else {
                                        $zone3_occupied_places++;
                                    }
                                }
                            }
                        }
                    }



                    $z1_Occup = ($zone1_occupied_places == 5*15);
                    $z2_Occup = ($zone2_occupied_places == 5*15);
                    $z3_Occup = ($zone3_occupied_places == 5*15);

                    $priceFrom = 0;
                    $priceTo = 0;

                    if (!$z1_Occup) {
                        $priceFrom = $rows['price_zone1'];
                    } else if (!$z2_Occup) {
                        $priceFrom = $rows['price_zone2'];
                    } else if (!$z3_Occup) {
                        $priceFrom = $rows['price_zone3'];
                    }

                    if ($priceFrom) {
                        if (!$z3_Occup) {
                            $priceTo = $rows['price_zone3'];
                        } else if (!$z2_Occup) {
                            $priceTo = $rows['price_zone2'];
                        } else if (!$z1_Occup) {
                            $priceTo = $rows['price_zone1'];
                        }

                        echo "Цены билетов:<br> от " . $priceTo. 'до'.$priceFrom?><form action="pay.php" method="get">
                    <input type="hidden" name="kid" value="<?= $rows['id'] ?>">

                    <input type="submit" value="Купить"/>
                    </form><?;
                    } else {
                        echo "Мест нет, попробуйте зайти позже.";
                    }

                                      ?>




                </div>




            <?php endforeach; ?>





    </tr>
</table>
</body>
</html>