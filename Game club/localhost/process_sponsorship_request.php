<?php
// Перевірка, чи були надіслані дані форми
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    // Перевірка, чи встановлені обов'язкові поля
    if (isset($_POST["admin_id"]) && isset($_POST["sponsor_id"]) && isset($_POST["requested_devices"])) {
        
        // Отримання даних з форми
        $admin_id = $_POST["admin_id"];
        $sponsor_id = $_POST["sponsor_id"];
        $requested_devices = $_POST["requested_devices"];

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

        // SQL-запит для вставки даних в таблицю sponsorship_requests
        $sql = "INSERT INTO sponsorship_requests (admin_id, sponsor_id, requested_devices) VALUES ('$admin_id', '$sponsor_id', '$requested_devices')";

        // Виконання запиту
        if ($conn->query($sql) === TRUE) {
            echo "Запит успішно надіслано";
        } else {
            echo "Помилка: " . $sql . "<br>" . $conn->error;
        }

        // Закриття з'єднання
        $conn->close();
    } else {
        echo "Не всі обов'язкові поля встановлені.";
    }
} else {
    echo "Невірний метод запиту.";
}
?>
