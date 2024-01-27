<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перегляд ігор</title>
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
            background-color: #222;
            color: #ffca28;
        }

        tr:nth-child(even) {
            background-color: #333;
        }

        tr:nth-child(odd) {
            background-color: #444;
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

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .view-reviews-button {
            background-color: #ffc107;
            color: #222;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        .view-reviews-button:hover {
            background-color: #ffca28;
        }
    </style>
</head>
<body>
    <header>
        <h1>База ігор</h1>
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
    <table>
        <tr>
            <th>ID</th>
            <th>Title</th>
            <th>Genre</th>
            <th>Release Date</th>
            <th>Platform</th>
        </tr>
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

        
        $sql = "SELECT * FROM games";
        $result = $conn->query($sql);

        
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["game_id"] . "</td>";
                echo "<td>" . $row["title"] . "</td>";
                echo "<td>" . $row["genre"] . "</td>";
                echo "<td>" . $row["release_date"] . "</td>";
                echo "<td>" . $row["platform"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>0 results</td></tr>";
        }

        // Закриття з'єднання
        $conn->close();
        ?>
    </table>

    <div class="button-container">
        <button class="view-reviews-button" onclick="window.location.href='game_reviews.php'">Переглянути відгуки до ігор</button>
        <button class="view-reviews-button" onclick="window.location.href='player_game_participation.php'">Час проведений в іграх</button>
    </div>

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>
</body>
</html>
