<?php
    session_start();
        if (!empty($_SESSION['auto'])){
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
                    <td>Сменить статус заявки</td>
                    <td><select name="status">
                        <option value = "в ожидании">в ожидании</option> <option value = "в работе">в работе</option>
                        <option value = "выполнено">выполнено</option>
                    </select>
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td><button>Исправить</button></td>
                </tr>
            </table>
        </form>
        <?php
require_once("db.php");
if(!empty($_POST['id'])&& !empty($_POST['status'])){
    $id=$_POST['id'];
    $status=$_POST['status'];
    $res_1=mysqli_query($link,"UPDATE problems SET status = '$status' WHERE id='$id'");
    if ($status=='выполнено'){
        $res_2=mysqli_query($link,"UPDATE problems SET date_end = NOW() WHERE id='$id'");
    }
    if ($res_1=='true'){
        header("Location: admin.php");
    }else{
        echo "Ошибка";
    }
}
?>
    </main>
</body>
</html>