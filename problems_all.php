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
    <meta name="viewport" content="width=device-width, initial-scale=1.0"> 
    <title>Техносервис</title>
    <link rel="stylesheet" href="css/style.css">
</head>

<body>
    <header>
        <h1>ООО Техносервис</h1>
    </header>
    <nav>
        <a href="index.php">Главная</a>
        <a href="problems.php">Подать заявку</a>
        <a href="problems_all.php">Все заявки</a>
        <a href="logout.php">Выход</a>
    </nav>
    <main>
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
    require_once ("db.php");
    $result=mysqli_query($link, "SELECT * FROM problems WHERE id_user = '$_SESSION[id_user]'");
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
?>
    </main>
</body>
</html>