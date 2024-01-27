<!-- request_sponsorship.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Запит до спонсора</title>
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

        h2 {
            text-align: center;
        }

        form {
            max-width: 600px;
            margin: 0 auto;
            background-color: #333;
            padding: 20px;
            border-radius: 10px;
            margin-top: 20px;
        }

        label {
            display: block;
            margin-bottom: 8px;
        }

        select, textarea {
            width: 100%;
            padding: 8px;
            margin-bottom: 16px;
        }

        input[type="submit"] {
            background-color: #ffc107;
            color: #222;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
        }

        input[type="submit"]:hover {
            background-color: #ffca28;
        }

        /* Стилі для кнопки перегляду запитів */
        .view-requests-button {
            background-color: #ffc107;
            color: #222;
            padding: 10px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            display: inline-block;
            text-decoration: none;
            font-size: 16px;
            margin-top: 10px;
            margin-left: 10px;
        }

        .view-requests-button:hover {
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
        <h1>Запит до спонсора</h1>
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

  
    <form action="process_sponsorship_request.php" method="post">
        <label for="admin_id">Адміністратор:</label>
        <select name="admin_id" required>
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

          
            $sql_admins = "SELECT admin_id, username FROM administrators";
            $result_admins = $conn->query($sql_admins);

            if ($result_admins->num_rows > 0) {
                while($row_admin = $result_admins->fetch_assoc()) {
                    echo "<option value='".$row_admin["admin_id"]."'>".$row_admin["username"]."</option>";
                }
            }

            // Закриття з'єднання
            $conn->close();
            ?>
        </select><br>

        <label for="sponsor_id">Спонсор:</label>
        <select name="sponsor_id" required>
            <?php
            // Підключення до бази даних
            $conn = new mysqli($servername, $username, $password, $dbname);

            // Перевірка з'єднання
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            // Код для вибору спонсорів
            $sql_sponsors = "SELECT sponsor_id, sponsor_name FROM sponsors";
            $result_sponsors = $conn->query($sql_sponsors);

            if ($result_sponsors->num_rows > 0) {
                while($row_sponsor = $result_sponsors->fetch_assoc()) {
                    echo "<option value='".$row_sponsor["sponsor_id"]."'>".$row_sponsor["sponsor_name"]."</option>";
                }
            }

            // Закриття з'єднання
            $conn->close();
            ?>
        </select><br>

        <label for="requested_devices">Перелік запитаних девайсів:</label>
        <textarea name="requested_devices" rows="4" required></textarea><br>

        <!-- Кнопка надсилання запиту -->
        <input type="submit" value="Надіслати запит">

        <!-- Кнопка перегляду запитів поруч із кнопкою надсилання -->
        <a href="view_sponsorship_requests.php" class="view-requests-button">Переглянути запити</a>
    </form>

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>
</body>
</html>
