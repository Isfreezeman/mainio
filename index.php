<?php
// Проверяем, если сообщение было отправлено
if (isset($_POST['message'])) {
    $message = strip_tags($_POST['message']); // Удаляем HTML-теги
    file_put_contents('messeng.txt', $message); // Записываем сообщение в файл
}

// Читаем текущее сообщение из файла
$currentMessage = file_exists('messeng.txt') ? file_get_contents('messeng.txt') : 'Здесь будет сообщение';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <style>
        #message {
            font-size: 24px;
            transition: transform 0.3s;
        }
        .bubble {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div id="message"><?php echo htmlspecialchars($currentMessage); ?></div>
    <input type="text" id="inputMessage" placeholder="Введите сообщение">
    <button id="sendMessage">Отправить</button>

    <script>
        const messageDiv = document.getElementById('message');
        const inputMessage = document.getElementById('inputMessage');
        const sendMessageButton = document.getElementById('sendMessage');

        // Функция для обновления сообщения
        function updateMessage() {
            fetch('messeng.txt')
                .then(response => response.text())
                .then(data => {
                    if (data !== messageDiv.innerText) {
                        messageDiv.innerText = data;
                        messageDiv.classList.add('bubble');
                        setTimeout(() => {
                            messageDiv.classList.remove('bubble');
                        }, 300);
                    }
                });
        }

        // Отправка сообщения
        sendMessageButton.addEventListener('click', () => {
            const message = inputMessage.value;
            if (message) {
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'message=' + encodeURIComponent(message)
                });
                inputMessage.value = '';
            }
        });

        // Обновление сообщения каждые 5 секунд
        setInterval(updateMessage, 5000);
    </script>
</body>
</html><?php
// Проверяем, если сообщение было отправлено
if (isset($_POST['message'])) {
    $message = strip_tags($_POST['message']); // Удаляем HTML-теги
    file_put_contents('messeng.txt', $message); // Записываем сообщение в файл
}

// Читаем текущее сообщение из файла
$currentMessage = file_exists('messeng.txt') ? file_get_contents('messeng.txt') : 'Здесь будет сообщение';
?>

<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Messenger</title>
    <style>
        #message {
            font-size: 24px;
            transition: transform 0.3s;
        }
        .bubble {
            transform: scale(1.2);
        }
    </style>
</head>
<body>
    <div id="message"><?php echo htmlspecialchars($currentMessage); ?></div>
    <input type="text" id="inputMessage" placeholder="Введите сообщение">
    <button id="sendMessage">Отправить</button>

    <script>
        const messageDiv = document.getElementById('message');
        const inputMessage = document.getElementById('inputMessage');
        const sendMessageButton = document.getElementById('sendMessage');

        // Функция для обновления сообщения
        function updateMessage() {
            fetch('messeng.txt')
                .then(response => response.text())
                .then(data => {
                    if (data !== messageDiv.innerText) {
                        messageDiv.innerText = data;
                        messageDiv.classList.add('bubble');
                        setTimeout(() => {
                            messageDiv.classList.remove('bubble');
                        }, 300);
                    }
                });
        }

        // Отправка сообщения
        sendMessageButton.addEventListener('click', () => {
            const message = inputMessage.value;
            if (message) {
                fetch('', {
                    method: 'POST',
                    headers: {
                        'Content-Type': 'application/x-www-form-urlencoded',
                    },
                    body: 'message=' + encodeURIComponent(message)
                });
                inputMessage.value = '';
            }
        });

        // Обновление сообщения каждые 5 секунд
        setInterval(updateMessage, 5000);
    </script>
</body>
</html>
