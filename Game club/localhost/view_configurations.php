<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перегляд конфігурацій</title>
    <style>
        body {
            background-color: #222;
            color: #ffc107;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            text-align: center;
            
            background-color: #ffc107;
            padding: 10px;
        }

        h1 {
            text-align: center;
            color: #222;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ffc107;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #222;
        }

        tr:nth-child(even) {
            background-color: #333;
        }

        tr:nth-child(odd) {
            background-color: #444;
        }

        nav {
            background-color: #222;
            padding: 10px;
            text-align: center;
        }

        nav a {
            color: #ffc107;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            color: #ffca28;
        }

        footer {
            background-color:#ffc107; 
            padding: 10px;
            text-align: center;
            color: #222;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Перегляд конфігурацій гравців</h1>
    </header>

    <nav>
        <a href="Untitled-1.php">Головна</a>
        <a href="view_players.php">Гравці</a>
        <a href="view_games.php">Ігри</a>
        <a href="view_configurations.php">Конфігурації</a>
        <a href="view_events.php">Івенти</a>
        <a href="view_event_participants.php">Учасники подій</a>
        <a href="view_player_friends.php">Друзі</a>
        <a href="view_admins.php">Адміністратори</a>
        <a href="view_sponsors.php">Спонсори</a>
    </nav>

    <?php
    // Підключення до бази даних
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Kyrsova";

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Перевірка з'єднання
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // SQL-запит для вибору конфігурацій гравців
    $sql_configurations = "SELECT * FROM player_configurations";
    $result_configurations = $conn->query($sql_configurations);
    ?>

    <?php
    if ($result_configurations->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Гравець</th><th>Монітор</th><th>Роздільна здатність монітора</th><th>Відеокарта</th><th>Процесор</th><th>Об'єм пам'яті</th><th>Об'єм накопичувача</th><th>Периферійні пристрої</th></tr>";
        while($row_configuration = $result_configurations->fetch_assoc()) {
            // Отримання імені гравця за його ID
            $player_id = $row_configuration["player_id"];
            $sql_player_name = "SELECT username FROM players WHERE player_id = '$player_id'";
            $result_player_name = $conn->query($sql_player_name);
            $row_player_name = $result_player_name->fetch_assoc();
            $player_name = $row_player_name["username"];

            echo "<tr>";
            echo "<td>".$row_configuration["config_id"]."</td>";
            echo "<td>".$player_name."</td>";
            echo "<td>".$row_configuration["monitor_brand"]."</td>";
            echo "<td>".$row_configuration["monitor_resolution"]."</td>";
            echo "<td>".$row_configuration["graphics_card"]."</td>";
            echo "<td>".$row_configuration["processor"]."</td>";
            echo "<td>".$row_configuration["memory_size"]."</td>";
            echo "<td>".$row_configuration["storage_size"]."</td>";
            echo "<td>".$row_configuration["peripherals"]."</td>";
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "0 results";
    }

    // Закриття з'єднання
    $conn->close();
    ?>

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>
</body>
</html>
