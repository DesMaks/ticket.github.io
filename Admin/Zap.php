<?php
include ('adm.php');
include ('header.php');
?>
<title>Добавление нового концерта</title>
    <meta http-equiv="Content-Type" content="text/html; charset=windows-1251">
<body>
<a href=admin_logout.php>Выйти из административной панели</a>

<table border="1" bordercolor="#000000" width="910" align="center" bgcolor="#a8b9ed" cellspacing="0" cellpadding="10">
  
    <tr>
        <?php include "left.php";?>
        <td>
            <form name="form1" method="post" action="Add_zap.php" ENCTYPE="multipart/form-data">
               
                <p>
                    <label>Ввеcти название концерта* (не менее 2 символов) <br>
                        <input type="text" name="title" id="title">
                    </label>
                </p>

                <p>
                    <label>Укажите цену зоны 1* <br>
                        <input type="text" name="price1" id="price1">
                    </label>
                </p>
                <p>
                    <label>Укажите цену зоны 2* <br>
                        <input type="text" name="price2" id="price2">
                    </label>
                </p>
                <p>
                    <label>Укажите цену зоны 3* <br>
                        <input type="text" name="price3" id="price3">
                    </label>
                </p>

                <p><label>Загрузить изображение<br>
                        <input type="file" name="userfile">
                </p>
                <p>Выберите дату и время*:<input type="datetime-local" name="calendar" ></p>
                <p><label>Ввеcти полное описание концерта*  (не менее 2 символов)<br>
                        <textarea name="text"></textarea></p>
                    </label></p>
                <p> <label>
                        <input type="submit" name="submit" id="submit" value="Занести данные записи в базу">
                        <input type="reset" value="Очистить форму">
                    </label>
                </p>
                <p> <label>
                        Поля помеченые * обязательны для заполнения
                    </label>
                </p>
            </form>
        </td>
    </tr>

</table>
<?php
include ('header.php');?>