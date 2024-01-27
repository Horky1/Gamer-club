<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Головна сторінка</title>
    <style>
        body {
            background-color: #222;
            color: #ffc107;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        header, nav, section, footer {
            width: 100%;
            text-align: center;
        }

        header, nav {
            background-color: #ffca28;
            text-color : #222           
            border: 2px solid #222;            
        }

        nav a {
            color: #222;
            text-decoration: none;
            margin: 0 10px;
        }

        nav a:hover {
            color: #FF4F00;
        }

        section {
            padding: 20px;
            width: 80%;
            margin: 0 auto;
        }

        button {
            background-color: #ffc107;
            color: #222;
            padding: 10px;
            margin: 5px;
            border: none;
            cursor: pointer;
            border-radius: 5px;
            display: block;
            width: 100%;
        }

        button:hover {
            background-color: #ffca28;
        }

        .buttons-container {
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        .comments-container {
            width: 100%;
            text-align: left;
            margin-top: 20px;
        }

        .comment {
            background-color: #333;
            padding: 10px;
            margin-bottom: 10px;
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
        <h1 style="color: #222;">Головна сторінка</h1>
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
        <div class="buttons-container">
            <?php
            echo '<button onclick="window.location.href=\'add_player_form.php\'">Додати нового гравця</button>';
            echo '<button onclick="window.location.href=\'add_game_form.php\'">Додати нову гру</button>';
            echo '<button onclick="window.location.href=\'player_configurations.php\'">Девайси гравців</button>';
            echo '<button onclick="window.location.href=\'add_events.php\'">Івенти в клубі</button>';
            echo '<button onclick="window.location.href=\'add_event_participant_form.php\'">Додати гравця до заходу</button>';
            echo '<button onclick="window.location.href=\'add_reqest.php\'">Додати запит до спонсора</button>';
            ?>
        </div>

        <div class="comments-container">
            <?php
            $servername = "localhost";
            $username = "root";
            $password = "";
            $dbname = "Kyrsova";

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $sql_comments = "SELECT player_comments.comment_id, players.username, player_comments.comment_text, player_comments.comment_date 
                            FROM player_comments 
                            JOIN players ON player_comments.player_id = players.player_id 
                            ORDER BY player_comments.comment_date DESC LIMIT 5";
            $result_comments = $conn->query($sql_comments);

            if ($result_comments->num_rows > 0) {
                echo "<h2>Останні коментарі гравців</h2>";
                while ($row_comment = $result_comments->fetch_assoc()) {
                    echo "<div class='comment'>";
                    echo "<p><strong>" . $row_comment["username"] . "</strong> написав(ла) " . $row_comment["comment_text"] . " on " . $row_comment["comment_date"] . "</p>";
                    echo "</div>";
                }
            } else {
                echo "<p>Немає коментарів</p>";
            }

            $conn->close();
            ?>
        </div>
    </section>

    <footer>
        &copy; 2023 Oblivion Game Club
    </footer>
</body>
</html>
