<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gracias por su pedido</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;500;700&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Lato:wght@300;400;700&display=swap" rel="stylesheet">
    <style>
        /* Основные стили */
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Roboto', sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
            color: #333;
        }

        /* Контейнер страницы */
        .container {
            width: 80%;
            margin: 0 auto;
            padding: 20px;
            text-align: center;
        }

        /* Заголовок */
        h1 {
            font-size: 2.5rem;
            color: #2c3e50;
            margin-bottom: 15px;
        }

        /* Подзаголовок */
        h2 {
            font-size: 1.2rem;
            color: #7f8c8d;
            margin-bottom: 30px;
        }

        /* Триггер дефицита */
        .offer {
            font-size: 1.5rem;
            font-weight: 700;
            color: #e74c3c;
            margin-bottom: 30px;
        }

        /* Стиль кнопок */
        .button {
            background-color: #3498db;
            color: white;
            padding: 15px 30px;
            font-size: 1.1rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #2980b9;
        }

        /* Формы обратной связи */
        .feedback-form {
            background-color: white;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            margin-top: 30px;
            width: 50%;
            margin-left: auto;
            margin-right: auto;
            display: none;
        }

        .feedback-form input,
        .feedback-form textarea {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 1rem;
        }

        .feedback-form button {
            background-color: #27ae60;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 1.1rem;
        }

        .feedback-form button:hover {
            background-color: #2ecc71;
        }

        /* Мультяшный оператор с анимацией пульсации */
        .operator-container {
            position: relative;
            display: inline-block;
            margin-top: 20px;
        }

        .operator {
            width: 150px;
            height: 150px;
            background: url('operator-image.png') no-repeat center center;
            background-size: contain;
            animation: pulse 1.5s ease-in-out infinite;
        }

        /* Анимация пульсации */
        @keyframes pulse {
            0% {
                transform: scale(1);
            }
            50% {
                transform: scale(1.1); /* Увеличение */
            }
            100% {
                transform: scale(1); /* Возвращение к исходному размеру */
            }
        }


        /* Мобильные стили (адаптивность) */
@media (max-width: 768px) {
    .container {
        width: 90%;
    }

    h1 {
        font-size: 2rem;
    }

    h2 {
        font-size: 1rem;
    }

    .offer {
        font-size: 1.2rem;
    }

    .button {
        font-size: 1rem;
        padding: 12px 25px;
    }

    .feedback-form {
        width: 80%;
        margin: 30px auto 0; /* Центрируем форму */
        box-sizing: border-box; /* Учитываем отступы при расчете ширины */
    }

    .feedback-form input,
    .feedback-form textarea {
        box-sizing: border-box; /* Учитываем отступы и границы в ширине */
        padding: 10px;
        margin-bottom: 15px;
        width: 100%; /* Полная ширина для ввода и текста */
    }

    .operator {
        width: 120px;
        height: 120px;
    }
}

@media (max-width: 480px) {
    h1 {
        font-size: 1.5rem;
    }

    .offer {
        font-size: 1.1rem;
    }

    .feedback-form {
        width: 90%;
        margin: 20px auto 0; /* Центрируем форму */
        box-sizing: border-box; /* Учитываем отступы при расчете ширины */
    }

    .feedback-form input,
    .feedback-form textarea {
        box-sizing: border-box; /* Учитываем отступы и границы в ширине */
        padding: 10px;
        margin-bottom: 15px;
        width: 100%; /* Полная ширина для ввода и текста */
    }

    .operator {
        width: 100px;
        height: 100px;
    }
}
    </style>
</head>
<body>

    <div class="container">
        <!-- Заголовок -->
        <h1> <p>¡Gracias por su pedido!<br> ¡Estás en el camino hacia una mejor salud!</p></h1>

        <!-- Мультяшный оператор с анимацией пульсации -->
        <div class="operator-container">
            <div class="operator"></div>
        </div>

        <!-- Подзаголовок -->
        <h2>Sus datos se han enviado correctamente, un representante oficial se comunicará con usted en breve.</h2>

        <!-- Триггер дефицита -->
        <p class="offer">¡Solo quedan 4 paquetes con este descuento!</p>

        <!-- CTA -->
        <p>Solo espere una llamada para discutir los detalles.</p>

        <!-- Дополнительное предложение -->
        <button class="button" id="share-button">¡Comparte este producto con un amigo y gana un lote de regalo!</button>
    </div>

    <script>
        document.getElementById("share-button").addEventListener("click", function() {
            if (navigator.share) {
                navigator.share({
                    title: '¡Compártelo con un amigo!',
                    text: 'Pedí este gran producto para la salud, echa un vistazo a la descripción, ¡lo recomiendo encarecidamente!',
                    url: 'https://elnutro.com/J89bzdbj' // Ссылка для поделиться [THANKS]
                }).then(() => {
                    console.log('Shared successfully!');
                }).catch((error) => {
                    console.log('Sharing failed', error);
                });
            } else {
                alert("Tu plataforma no admite la función de compartir.");
            }
        });
    </script>
</body>
</html>