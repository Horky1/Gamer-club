<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати учасника до події</title>
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

        h2, button {
            color: #ffc107;
        }

        form {
            max-width: 300px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #ffc107;
            color: #222;
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #ffca28;
        }

        button {
            background-color: #ffc107;
            color: #222;
            padding: 10px;
            margin-top: 10px;
            cursor: pointer;
            border: none;
            border-radius: 5px;
        }

        button:hover {
            background-color: #ffca28;
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
        <h1>Додати учасника до події</h1>
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

    
    <form action="process_add_event_participant.php" method="post">
        <label for="player_id">Гравець:</label>
        <select name="player_id" required>
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

            // Код для вибору гравців
            $sql_players = "SELECT player_id, username FROM players";
            $result_players = $conn->query($sql_players);

            if ($result_players->num_rows > 0) {
                while($row_player = $result_players->fetch_assoc()) {
                    echo "<option value='".$row_player["player_id"]."'>".$row_player["username"]."</option>";
                }
            }
            ?>
        </select><br>

        <label for="event_id">Подія:</label>
        <select name="event_id" required>
            <?php
            // Код для вибору подій
            $sql_events = "SELECT event_id, title FROM events";
            $result_events = $conn->query($sql_events);

            if ($result_events->num_rows > 0) {
                while($row_event = $result_events->fetch_assoc()) {
                    echo "<option value='".$row_event["event_id"]."'>".$row_event["title"]."</option>";
                }
            }

            // Закриття з'єднання
            $conn->close();
            ?>
        </select><br>

        <input type="submit" value="Додати учасника">
    </form>

    

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>
</body>
</html>
