<?include('bdConection.php');
$titles = 'Спасибо за покупку!';
include ('header.php');




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

<body>
<table align="center">

    <tr>
        <td valign="top" align="center"><br>

                <?
                if($_POST['koncert_id'])
                    echo "<script>window.location.href='succes.php'</script>";
                
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