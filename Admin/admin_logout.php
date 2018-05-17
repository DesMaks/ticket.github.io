<?php session_start ();
if (!$_SESSION['admin']) die ( Запрещено );
session_destroy ();
?>
<html>
<head>
    <title>Административная панель</title>
    <link href="styles.css" type="text/css" rel="stylesheet">
    <style type= «text/css»>
        #wrap{
            width: 100%;
            height: 100%;
        }
        .loginbox1{width: 300px;
            padding: 4px;
            border: 1px solid #777;
            background-color: #777;
            color: white;
       font-weight: bold;
        }
        .loginbox2{
            width: 300px;
            padding: 4px;
            border: 1px solid #777;
            color: #777;
        }
    </style>
</head>
<body>
<center>
    <table cellpadding= «0» cellspacing= «0» id= «wrap»>
        <tr>
            <td align= «center»>
                <table cellpadding= «0» cellspacing= «0»>
                    <tr>
                        <td class= «loginbox1» align= «center»>Выход успешно выполнен</td>
                    </tr>
                    <tr>
                        <td class= «loginbox2» align= «center»>
                            <a href=index.php>
                                Вернуться на главную страницу</a>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</center>
</body>
</html>
