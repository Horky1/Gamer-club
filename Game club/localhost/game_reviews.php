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

// SQL-запит для вибору відгуків гравців про ігри
$sql = "SELECT
            game_reviews.review_id,
            games.title AS game_title,
            players.username AS player_name,
            game_reviews.rating,
            game_reviews.review_text,
            game_reviews.review_date
        FROM
            game_reviews
        INNER JOIN games ON game_reviews.game_id = games.game_id
        INNER JOIN players ON game_reviews.player_id = players.player_id";

$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Відгуки гравців про ігри</title>
    <style>
        /* Ваш CSS-код тут */
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
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ffc107;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #ffc107;
            color: #222;
        }

        tr:nth-child(even) {
            background-color: #333;
        }

        tr:nth-child(odd) {
            background-color: #444;
        }
    </style>
</head>
<body>
    <header>
        <h1>Відгуки гравців про ігри</h1>
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
        if ($result->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>ID</th><th>Гра</th><th>Гравець</th><th>Рейтинг</th><th>Відгук</th><th>Дата</th></tr>";
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["review_id"] . "</td>";
                echo "<td>" . $row["game_title"] . "</td>";
                echo "<td>" . $row["player_name"] . "</td>";
                echo "<td>" . $row["rating"] . "</td>";
                echo "<td>" . $row["review_text"] . "</td>";
                echo "<td>" . $row["review_date"] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
        } else {
            echo "0 results";
        }

        // Закриття з'єднання
        $conn->close();
        ?>
    </section>
</body>
</html>
