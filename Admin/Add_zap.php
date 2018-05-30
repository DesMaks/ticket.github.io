
<?php
include ('adm.php');
include ('clean_check.php');
include ('header.php');
include ('bdConection.php');

$title = $_POST['title'];
$text = $_POST['text'];
$price1 = $_POST['price1'];
$price2 = $_POST['price2'];
$price3 = $_POST['price3'];
$date_concert = $_POST['calendar'];


$uploaddir = 'photo/';

$apend = date('YmdHis').'.jpg';

$uploadfile = "$uploaddir.$apend";

$urlimages= $_SERVER['SERVER_NAME']."/Admin/".$uploadfile."";
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

    <body>
<a href=admin_logout.php>Выйти из административной панели</a>
<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";?>
        <td>


            <?php
            if(!empty($title) && !empty($text)&& !empty($price1)&& !empty($price2)&& !empty($price3)) {


                if(check_length($title, 2, 25) && check_length($text, 2, 2000)) {
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
            if($_POST['title'])
                echo "<script>window.location.href='admin_main.php'</script>";


?>
    
        </td>
    </tr>

</table>
<?include('footer.php')?>
