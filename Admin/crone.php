<?php
    if (php_sapi_name() !== 'cli') die('Запуск запрещен');
    include ('bdConection.php');
    $zapis = $dbh->query('SELECT * from zayavk ORDER BY id');
    foreach($zapis as $row):

        $oplt = $row['payed'];
         $putdate = $row['date_adds'];
            $putdate = (new DateTime( $putdate))->getTimestamp();
              $today = time();
                $dates = date('Y-m-d H:i');
                 if(  $oplt <= 0 && $putdate+3600<=$today) {
                        try
                        {
                           $Concertid = $dbh->prepare('DELETE FROM zayavk WHERE id = :ID');
                            $Concertid->execute(array(
                                ':ID' => $row['id']));
                            $dbh = null;
                        } catch (PDOException $e) {
                            print "Error!: " . $e -> getMessage();
                            die();
                        }
                    }
                     endforeach;?>

