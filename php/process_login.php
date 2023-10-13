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
$login = $_POST["login"];
$password = $_POST["password"];

// Подготавливаем и выполняем SQL-запрос для записи данных в базу данных
$sql = "SELECT * FROM users WHERE login='$login' AND password='$password'";


$result = $conn->query($sql);

// Проверяем количество найденных записей в результате запроса
if ($result->num_rows == 1) {
    session_start();
    $_SESSION['login'] = $login;
    header("Location:  http://nondank5.beget.tech/dashboard.php"); 
} else {
    echo "Invalid login or password"; 
}
$conn->close();
?>