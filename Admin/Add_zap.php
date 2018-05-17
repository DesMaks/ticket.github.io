
<?php
session_start ();

if (!$_SESSION['admin']) die ( Запрещено );


include ('bdConection.php');

$title =$_POST['title'];
$text=$_POST['text'];
$price1=$_POST['price1'];
$price2=$_POST['price2'];
$price3=$_POST['price3'];
$date_concert=$_POST['calendar'];
function clean($value = "") {
    $value = trim($value);
    $value = stripslashes($value);
    $value = strip_tags($value);
    $value = htmlspecialchars($value);

    return $value;
}

function check_length($value = "", $min, $max) {
    $result = (mb_strlen($value) < $min || mb_strlen($value) > $max);
    return !$result;
}


$title = clean($title);
$text = clean($text);
$price1 = clean($price1);
$price2 = clean($price2);
$price3 = clean($price3);

?>
<?PHP

$uploaddir = 'photo/';

$apend=date('YmdHis').'.jpg';

$uploadfile = "$uploaddir$apend";

$urlimages= "ticket.site/Admin/".$uploadfile."";
if(($_FILES['userfile']['type'] == 'image/gif' || $_FILES['userfile']['type'] == 'image/jpeg' || $_FILES['userfile']['type'] == 'image/png'))
{

    if (move_uploaded_file($_FILES['userfile']['tmp_name'], $uploadfile))
    {

        $size = getimagesize($uploadfile);

        if ($size[0] < 2000 && $size[1]<2000)
        {

        } else {
            echo "Загружаемое изображение превышает допустимые нормы (ширина не более - 2000; высота не более 2000)";
            unlink($uploadfile);

        }
    } else {
        echo "Файл не загружен, вернитеcь и попробуйте еще раз";
    }
}

?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Добавление нового концерта</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
    <link href="styles.css" type="text/css" rel="stylesheet">
</head>
<body>
<a href=admin_logout.php>Выйти из административной панели</a>
<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";?>
        <td>


            <?php
            if(!empty($title) && !empty($text)&& !empty($price1)&& !empty($price2)&& !empty($price3)) {


                if(check_length($title, 2, 25) && check_length($text, 2, 1000)) {
                    try
                    {

                        $sql="insert into `zap` (title, text,photo,price_zone1,price_zone2,price_zone3,date_concert) values (:title,:text,:photo,:price_zone1,:price_zone2,:price_zone3,:date_concert)";
                        $sth=$dbh->prepare($sql);
                        $sth->execute(array(
                            ":photo" => $urlimages,
                            ":title" => $title,
                            ":text" => $text,
                            ":price_zone1" => $price1,
                            ":price_zone2" => $price2,
                            ":price_zone3" => $price3,
                            ":date_concert" => $date_concert,
                        ));

                        $dbh = null;
                    } catch (PDOException $e) {
                        print "Error!: " . $e->getMessage() . "<br/>";
                        die();
                    }
                    {echo  "<p>Новый концерт успешно добавлен!</p>";}
                } else {
                    echo "Введенные данные некорректные";
                }
            } else {
                echo "Заполните пустые поля";
            }



?>
        </td>

</table>
</font>
</body>
<html>