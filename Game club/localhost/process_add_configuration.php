<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $player_id = $_POST["player_id"];
    $monitor_brand = $_POST["monitor_brand"];
    $monitor_resolution = $_POST["monitor_resolution"];
    $graphics_card = $_POST["graphics_card"];
    $processor = $_POST["processor"];
    $memory_size = $_POST["memory_size"];
    $storage_size = $_POST["storage_size"];
    $peripherals = $_POST["peripherals"];

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

    // SQL-запит для вставки нової конфігурації гравця
    $sql = "INSERT INTO player_configurations (player_id, monitor_brand, monitor_resolution, graphics_card, processor, memory_size, storage_size, peripherals)
            VALUES ('$player_id', '$monitor_brand', '$monitor_resolution', '$graphics_card', '$processor', '$memory_size', '$storage_size', '$peripherals')";

    if ($conn->query($sql) === TRUE) {
        echo "Нова конфігурація успішно додана";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }

    // Закриття з'єднання
    $conn->close();
}
?>
