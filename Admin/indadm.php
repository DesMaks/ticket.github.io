<?php
$titles = 'Административная панель';
include ('header.php');?>
<body>
<center>



    <table>
        <tr>
            <td class="loginbox1" align="center">Вход в административную панель</td>
        </tr>
        <tr>
            <td class="loginbox2" align="center">
                <form action="index.php" method="post">
                    <label>введите логин</label>
                    <input type="text" name="login">
                    <br><label>введите пароль</label>
                    <input type="password" name="password">
                    <br>
                    <input type="submit" value="Войти">
                </form>
            </td>
        </tr>

    </table>
    
</center>
<?php
include ('footer.php');?>