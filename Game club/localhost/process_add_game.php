<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $genre = $_POST["genre"];
    $release_date = $_POST["release_date"];
    $platform = $_POST["platform"];

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

    // Вставка нової гри в базу даних
    $sql = "INSERT INTO games (title, genre, release_date, platform) VALUES ('$title', '$genre', '$release_date', '$platform')";

    if ($conn->query($sql) === TRUE) {
        echo "Нова гра успішно додана";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }

    // Закриття з'єднання
    $conn->close();
}
?>
