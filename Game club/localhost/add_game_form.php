<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Додати нову гру</title>
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
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <header>
        <h1>Додавання нової гри</h1>
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

    <form action="process_add_game.php" method="post">
        <label for="title">Назва:</label>
        <input type="text" name="title" required><br>

        <label for="genre">Жанр:</label>
        <input type="text" name="genre"><br>

        <label for="release_date">Дата релізу:</label>
        <input type="date" name="release_date"><br>

        <label for="platform">Платформа:</label>
        <input type="text" name="platform"><br>

        <input type="submit" value="Додати гру">
    </form>

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>
</body>
</html>
