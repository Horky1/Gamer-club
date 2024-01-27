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

// Отримання даних з форми
$player_id = $_POST['player_id'];
$event_id = $_POST['event_id'];

// SQL-запит для вставки учасника до події
$sql = "INSERT INTO event_participants (player_id, event_id) VALUES ('$player_id', '$event_id')";

if ($conn->query($sql) === TRUE) {
    echo "Учасника успішно додано до події.";
} else {
    echo "Помилка: " . $sql . "<br>" . $conn->error;
}

// Закриття з'єднання
$conn->close();
?>
<button onclick="window.location.href='view_event_participants.php'">Переглянути учасників</button>
