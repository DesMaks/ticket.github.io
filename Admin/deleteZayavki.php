
<?php
include ('adm.php');
include ('bdConection.php');
include ('header.php');

$zapis = $dbh->query('SELECT * from zayavk ');
if(!$_GET['id'])
    header('Location: /');
?>
<?php foreach($zapis as $row): ?>

<?php endforeach;?>
<title>Удаление существующей заявки</title>

<body>

<a href=admin_logout.php>Выйти из административной панели</a>

<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">

    <tr>
        <?php include "left.php";?>
        <td>

            <form name="delete" method="post" action="deleteZayavkiAction.php">
                <input type="hidden" name="ID" value="<?=$_GET['id']?>">
                <label>Удалить выбранную заявку на концерт?<br></form>
         
            <input type="submit" name="submit" id="submit" value="Да"><br><br>
            <form method="get" action="zayavki.php">
                <button type="">Нет</button>
            </form>

        </td>
    </tr>

</table>
<?include ('footer.php');?>
