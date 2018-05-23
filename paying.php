<?include ('header.php');

include('bdConection.php');


            $places = $_POST['places'];
            $email = $_POST['email'];
            $oplata = $_POST['oplata'];
            $koncert_id = $_POST['koncert_id'];
            $date_adds  = date('Y-m-d H:i:s');
            try {
                $sql = "INSERT INTO `zayavk`(`email`, `payed`, `active`, `koncert_id`, `places`,`date_adds`) VALUES (:email,:oplata,1,:koncert_id,:places,:date_adds)";
                $sth = $dbh->prepare($sql);
                $sth->bindParam(':places', $places);
                $sth->bindParam(':email', $email);
                $sth->bindParam(':oplata', $oplata);
                $sth->bindParam(':koncert_id', $koncert_id);
                $sth->bindParam(':date_adds', $date_adds);
                $sth->execute();



               
?>



<title>Спасибо за покупку!</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">

    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<table align="center">

    <tr>
        <td valign="top" align="center"><br>
                succes.php
                <?
                if($_POST['koncert_id'])
                    header('Location:succes.php');
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
            ?>
        <td width="200px" valign="top"><br>

        </td>
    </tr>
</table>
<?include ('footer.php');?>