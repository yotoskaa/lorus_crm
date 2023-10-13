<?php
header('Content-Type: text/html; charset=UTF-8'); // Заголовок станицы с кодировкой (для корректного отображения в браузере)
mb_internal_encoding('UTF-8'); // Установка внутренней кодировки в UTF-8
mb_http_output('UTF-8'); // Установка кодировки UTF-8 входных данных HTTP-запроса
mb_http_input('UTF-8'); // Установка кодировки UTF-8 выходных данных HTTP-запроса
mb_regex_encoding('UTF-8'); // Установка кодировки UTF-8 для многобайтовых регулярных выражений 


// Устанавливаем параметры подключения к базе данных
$servername = "localhost";
$username = "nondank5_1";
$password = "Zxcasd12";
$dbname = "nondank5_1";

// Создаем соединение с базой данных
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверяем соединение
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем данные из формы
$first_name = $_POST["first_name"];
$last_name = $_POST["last_name"];
$phone_number = $_POST["phone_number"];

// Подготавливаем и выполняем SQL-запрос для записи данных в базу данных
$sql = "INSERT INTO users (first_name, last_name, phone_number) VALUES ('$first_name', '$last_name', '$phone_number')";

if ($conn->query($sql) === TRUE) {
header ('Location: http://nondank5.beget.tech/registration2.html');  // перенаправление на нужную страницу
   exit(); 

} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>