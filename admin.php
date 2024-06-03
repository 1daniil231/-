<?php
    session_start();
        if (empty($_SESSION['auth'])){
            header("Location: index.php");
        }
        if (!$_SESSION['user_status'] == '0'){
            header("Location: problems_all.php");
        }
            require_once('db.php');
        $counter=mysqli_query($link, "SELECT COUNT(*) as count FROM problems WHERE status='выполнено'");
        $count=mysqli_fetch_assoc($counter);
        $count_res= $count['count'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Техносервис</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>Панель администратора ООО Техносервис</h1>
    </header>
    <nav>
        <a href="admin.php">Главная</a>
        <a href="problems.php">Подать заявку</a>
        <a href="add_worker.php">Добавить исполнителя</a>
        <a href="update_problem_status.php">Изменить статус заявки</a>
        <a href="update_problem_opisanie.php">Изменить описание проблемы</a>
        <a href="logout.php">Выход</a>
    </nav>
    <main>
        <p>Кол-во выполненых заявок: <?php echo $count_res;?> </p>
        <h2>Введите ФИО</h2>
        <form method="POST">
            <label for="fio"></label>
            <input type="text" name="fio" id="fio" placeholder = "Иванов И.И.">
            <button>Найти</button>
        </form>
        <table>
            <tr>
                <th>Номер заявки</th>
                <th>Дата добавления</th>
                <th>Оборудование</th>
                <th>Тип неисправности</th> 
                <th>Описание проблемы</th>
                <th>ФИО клиента</th>
                <th>Статус заявки</th>
            </tr>
<?php
    require_once("db.php");
    if (!empty($_POST['fio'])){
    $search_fio=mysqli_query($link, "SELECT * FROM problems WHERE fio='$_POST[fio]'");
    while ($row_0=mysqli_fetch_assoc($search_fio)){
        echo "<tr>
                <td>$row_0[id]</td>
                <td>$row_0[date_start]</td>
                <td>$row_0[oborud]</td>
                <td>$row_0[neispravnost]</td>
                <td>$row_0[opisanie]</td>
                <td>$row_0[fio]</td>
                <td>$row_0[status]</td>
                </tr>";
    }
    }
    else{
    $result=mysqli_query($link, "SELECT * FROM problems ORDER BY id DESC");
    while ($row=mysqli_fetch_assoc($result)){
        echo "<tr>
                <td>$row[id]</td>
                <td>$row[date_start]</td>
                <td>$row[oborud]</td>
                <td>$row[neispravnost]</td>
                <td>$row[opisanie]</td>
                <td>$row[fio]</td>
                <td>$row[status]</td>
                </tr>";
    }
}
?>
    </main>
</body>
</html>