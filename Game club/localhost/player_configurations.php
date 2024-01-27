<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати конфігурацію гравця</title>
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

        h1, h2 {
            color: #222;
        }

        form {
            max-width: 300px;
            margin: 20px auto;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input {
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
            
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Конфігурації гравців</h1>
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

    <form action="process_add_configuration.php" method="post">
        <label for="player_id">Оберіть гравця:</label>
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

            // SQL-запит для вибору гравців
            $sql = "SELECT * FROM players";
            $result = $conn->query($sql);

            // Виведення опцій вибору гравців
            while($row = $result->fetch_assoc()) {
                echo "<option value='".$row["player_id"]."'>".$row["username"]."</option>";
            }

            // Закриття з'єднання
            $conn->close();
            ?>
        </select><br>

        <label for="monitor_brand">Бренд монітора:</label>
        <input type="text" name="monitor_brand" required><br>

        <label for="monitor_resolution">Роздільна здатність монітора:</label>
        <input type="text" name="monitor_resolution"><br>

        <label for="graphics_card">Графічна карта:</label>
        <input type="text" name="graphics_card"><br>

        <label for="processor">Процесор:</label>
        <input type="text" name="processor"><br>

        <label for="memory_size">Об'єм пам'яті (GB):</label>
        <input type="number" name="memory_size" required><br>

        <label for="storage_size">Об'єм зберігання (GB):</label>
        <input type="number" name="storage_size" required><br>

        <label for="peripherals">Периферійні пристрої:</label>
        <input type="text" name="peripherals"><br>

        <input type="submit" value="Додати конфігурацію">
    </form>

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>
</body>
</html>
