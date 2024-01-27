<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перегляд гравців</title>
    <style>
        body {
            background-color: #222;
            color: #ffc107;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            color: #222;
            background-color: #ffc107;
            padding: 10px;
            text-align: center;
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

        h1 {
            text-align: center;
            color: #222;
        }

        ul {
            list-style-type: none;
            padding: 0;
            margin: 20px 0;
        }

        li {
            background-color: #444;
            padding: 10px;
            margin: 5px 0;
            border-radius: 5px;
        }

        footer {
            background-color: #ffc107;
            padding: 10px;
            text-align: center;
            color: #222;
        
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>База гравців</h1>
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

    <h1>База гравців</h1>

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

    // SQL-запит для вибору гравців
    $sql = "SELECT * FROM players";
    $result = $conn->query($sql);

    // Виведення результатів
    if ($result->num_rows > 0) {
        echo "<ul>";
        while($row = $result->fetch_assoc()) {
            echo "<li>".$row["username"]." - ".$row["email"]."</li>";
        }
        echo "</ul>";
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
