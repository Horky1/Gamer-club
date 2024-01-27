<!-- view_sponsorship_requests.php -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Перегляд запитів до спонсорів</title>
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
    </style>
</head>
<body>
    <header>
        <h1>Перегляд запитів до спонсорів</h1>
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
            <th>Адміністратор</th>
            <th>Спонсор</th>
            <th>Перелік запитаних девайсів</th>
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

        // SQL-запит для вибору запитів до спонсорів з відображенням імен адміністраторів та спонсорів
        $sql = "SELECT r.request_id, a.username AS admin_name, s.sponsor_name, r.requested_devices
                FROM sponsorship_requests r
                JOIN administrators a ON r.admin_id = a.admin_id
                JOIN sponsors s ON r.sponsor_id = s.sponsor_id";

        $result = $conn->query($sql);

        // Виведення результатів
        if ($result->num_rows > 0) {
            while ($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo "<td>" . $row["request_id"] . "</td>";
                echo "<td>" . $row["admin_name"] . "</td>";
                echo "<td>" . $row["sponsor_name"] . "</td>";
                echo "<td>" . $row["requested_devices"] . "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='4'>0 results</td></tr>";
        }

        // Закриття з'єднання
        $conn->close();
        ?>
    </table>

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>
</body>
</html>
