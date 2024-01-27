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

// SQL-запит для вибору друзів гравця
$sql_friends = "SELECT * FROM player_friends";
$result_friends = $conn->query($sql_friends);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перегляд друзів гравців</title>
    <style>
        body {
            background-color: #222;
            color: #ffc107;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #ffc107;
            padding: 10px;
            text-align: center;
        }

        h1 {
            color: #222;
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

        section {
            padding: 20px;
            text-align: center;
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

        footer {
            background-color: #ffc107;
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
        <h1>Перегляд друзів гравців</h1>
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

    <section>
        
        <?php
        if ($result_friends->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Гравець 1</th><th>Гравець 2</th><th>Дата дружби</th></tr>";
            while ($row_friend = $result_friends->fetch_assoc()) {
                // Отримання імен гравців за їх ID
                $player1_id = $row_friend["player1_id"];
                $player2_id = $row_friend["player2_id"];

                $sql_player1 = "SELECT username FROM players WHERE player_id = '$player1_id'";
                $sql_player2 = "SELECT username FROM players WHERE player_id = '$player2_id'";

                $result_player1 = $conn->query($sql_player1);
                $result_player2 = $conn->query($sql_player2);

                $row_player1 = $result_player1->fetch_assoc();
                $row_player2 = $result_player2->fetch_assoc();

                $player1_name = $row_player1["username"];
                $player2_name = $row_player2["username"];

                echo "<tr>";
                echo "<td>".$row_friend["friendship_id"]."</td>";
                echo "<td>".$player1_name."</td>";
                echo "<td>".$player2_name."</td>";
                echo "<td>".$row_friend["friendship_date"]."</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "Немає записів про дружбу.";
        }
        ?>
    </section>

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>

    <?php
    // Закриття з'єднання
    $conn->close();
    ?>
</body>
</html>

