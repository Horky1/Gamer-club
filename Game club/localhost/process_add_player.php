
<?php

// Оголошення змінних для підключення до бази даних
$servername = "localhost";
$db_username = "root";
$db_password = "";
$dbname = "Kyrsova";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $email = $_POST["email"];
    $password = $_POST["password"];

   
    $conn = new mysqli($servername, $db_username, $db_password, $dbname);

    
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    
    $sql = "INSERT INTO players (username, email, password) VALUES ('$username', '$email', '$password')";

    if ($conn->query($sql) === TRUE) {
        echo "Новий гравець успішно доданий";
    } else {
        echo "Помилка: " . $sql . "<br>" . $conn->error;
    }

    // Закриття з'єднання
    $conn->close();
}



