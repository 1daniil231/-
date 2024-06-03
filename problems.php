<?php
    session_start();
        if (empty($_SESSION['auth'])){
            header('Location: index.php');
        }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/style.css">
    <title>Техносервис</title>
</head>
<body>
<header>
    <h1>ООО Техносервис<h1>
</header>
<nav>
    <a href="index.php">Главная</a>
    <a href="problems.php">Подать заявку</a>
    <a href="logout.php">Выход</a>
</nav>  
<main>
    <h2>Подать заявку</h2>
    <form class="problems" action="" method="POST">
        <table>
            <tr>
                <td><label for = "oborud">Оборудование</label></td>
                <td><input type="text" id = "oborud" name="oborud" ></td>
            </tr>
            <tr>
                <td><label for = "neispravnost">Тип неисправности</label></td>
                <td><textarea type="text" id ="neispravnost" name="neispravnost" ></textarea></td>
            </tr>
            <tr>
                <td><label for = "opisanie">Описание проблемы</label></td>
                <td><textarea id ="opisanie" name="opisanie" ></textarea></td>
            </tr>
            <tr>
                <td><label for="fio">ФИО клиента</label></td>
                <td><input type="text" id="fio" name="fio"></td>

            </tr>
            <tr>
                <td></td>
                <td><button>Отправить</button></td>
            </tr>
        </table>
    </form>
</main>
<?php
        require_once("db.php");
                if (!empty($_POST['oborud'])&& !empty($_POST['neispravnost'])&& !empty($_POST['opisanie'])&& !empty($_POST['fio']))
                {
                $oborud = $_POST['oborud'];
                $neispravnost = $_POST['neispravnost'];
                $opisanie = $_POST['opisanie'];
                $fio = $_POST['fio'];
                $id_user = $_SESSION['id_user'];
                $result = mysqli_query ($link, "INSERT INTO problems(oborud,neispravnost,opisanie,fio,id_user) VALUES ('$oborud','$neispravnost','$opisanie','$fio','$id_user')");
                    if ($result == 'true'){
                        header("Location: problems_all.php");
                    }
                        else{
                            echo "ошибка";
                    }}
?>
</body>
</html>