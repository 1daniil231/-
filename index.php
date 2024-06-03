<?php
    session_start();
    require_once("db.php");
    if (!empty($_POST['login']) && !empty($_POST['password']))
        {
            $login = $_POST['login'];
            $password = md5($_POST['password']);
    $result = mysqli_query($link,"SELECT * FROM users WHERE login = '$login' AND password = '$password'");
    $user = mysqli_fetch_assoc($result);
        if (!empty($user)){
            $_SESSION['auth'] = true;
            $_SESSION['login'] = $user['login'];
            $_SESSION['id_user'] = $user['id'];
            $_SESSION['user_status'] = $user['status'];
        if($_SESSION['user_status']=='0') {
            header("Location: admin.php");
        }
        else {
            header("Location: problems.php");
        }}
        else{
           echo "<script>alert('Возможно вы не коркетно заполнили логин и пароль, проверте заполнение этих полей')</script>";
        }
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
</nav>  
<main>
    <h2>Авторизация</h2>
    <form method="POST">
        <label for="login">Логин</label>
        <input type="text" name="login" id="login">
        <label for="password">Пароль</label>
        <input type="password" name="password" id="password">
        <button>Войти</button>
    </form>
</main>
</body>
</html>


