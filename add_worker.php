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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> <title>Техносервис</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>ООО Техносервис</h1>
    </header>
    <nav>
        <a href="admin.php">Главная</a>
        <a href="problems.php">Подать заявку</a>
        <a href="logout.php">Выход</a>
    </nav>
    <main>
        <h2>Изменить статус заявки</h2>
        <form method="POST">
        <table>
            <tr>
                <td><label for = "id">Номер заявки</label></td>
                <td><input type="text" id = "id" name="id" ></td>
            </tr>
            <tr>
                <td><label for = "id_worker">Назначить исполнителя</label></td>
                <td><input type="text" id = "id_worker" name="id_worker" ></td>
            </tr>
            <tr>
                <td></td>
                <td><button>Добавить</button></td>
            </tr>
        </table>
        </form>
        <?php
            require_once("db.php");
            if(!empty($_POST['id'])&&!empty($_POST['area'])){
                $id=$_POST['id'];
                $area=$_POST['area'];
                $result=mysqli_query($link,"UPDATE problems SET opisanie = '$area' WHERE id = '$id'");
                if($result=='true'){
                header("Location: admin.php");
            } else {
                alert("Ошибка");
            }
            }
            ?>
    </main>
</body>
</html>