<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $title = $_POST["title"];
    $date = $_POST["date"];
    $description = $_POST["description"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "Kyrsova";

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    $sql = "INSERT INTO events (title, date, description) VALUES ('$title', '$date', '$description')";

    if ($conn->query($sql) === TRUE) {
        echo "Новий івент успішно доданий";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>

