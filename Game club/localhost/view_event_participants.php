<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перегляд учасників подій</title>
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

         th {
            color: #ffc107;
        }

        h1 {
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
            background-color: #222;
        }

        footer {
            background-color: #ffca28;
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
        <h1>Перегляд учасників подій</h1>
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

    // SQL-запит для вибору учасників подій
    $sql_participants = "SELECT ep.participant_id, p.username AS player_name, e.title AS event_title, ep.registration_date FROM event_participants ep
                        JOIN players p ON ep.player_id = p.player_id
                        JOIN events e ON ep.event_id = e.event_id";

    $result_participants = $conn->query($sql_participants);

    if ($result_participants->num_rows > 0) {
        echo "<table>";
        echo "<tr><th>ID</th><th>Гравець</th><th>Подія</th><th>Дата реєстрації</th></tr>";
        while($row_participant = $result_participants->fetch_assoc()) {
            echo "<tr>";
            echo "<td>".$row_participant["participant_id"]."</td>";
            echo "<td>".$row_participant["player_name"]."</td>";
            echo "<td>".$row_participant["event_title"]."</td>";
            echo "<td>".$row_participant["registration_date"]."</td>";
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
