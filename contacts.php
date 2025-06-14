<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EcoTure | Контакты</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.1.3/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/fontawesome/6.0.0/css/all.min.css" rel="stylesheet">
    <style>
        body {
            font-family: 'Montserrat', sans-serif;
            background-color: #f7f7f7;
            color: #222;
            line-height: 1.6;
        }

        /* Шрифты и цвета */
        :root {
            --primary-color: #3498db;
            --secondary-color: #fcfcfc;
        }

        /* Верхняя панель */
        #main-nav {
            background-color: #111828;
            height: 60px;
            display: flex;
            align-items: center;
            padding: 0 20px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            position: relative;
            z-index: 10;
        }

        .logo-holder {
            display: flex;
            align-items: center;
        }

        .logo-img {
            height: 50px;
            width: auto;
            margin-right: 15px;
            border-radius: 8px;
            object-fit: contain;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }

        .logo-text {
            color: #fff;
            font-size: 24px;
            font-weight: 700;
        }

        #main-menu {
            list-style: none;
            display: flex;
            margin-left: auto;
        }

        .main-menu-item {
            margin-left: 15px;
        }

        .main-menu-item a {
            color: #fff;
            text-decoration: none;
            padding: 10px 15px;
            border-radius: 6px;
            font-weight: 500;
            transition: background-color 0.3s, transform 0.2s;
        }

        .main-menu-item a:hover {
            background-color: #eb7f00;
            transform: translateY(-2px);
        }

        /* Секция контактов */
        #contacts {
            padding: 5rem 0;
            background-color: var(--secondary-color);
        }

        .section-header {
            text-align: center;
            margin-bottom: 3rem;
        }

        .section-header h2 {
            font-size: 2.5rem;
            margin-bottom: 1rem;
        }

        .section-header p {
            color: #777;
        }

        /* Карточки контактов */
        .contact-card {
            border-radius: 10px;
            background-color: #fff;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            padding: 2rem;
            text-align: center;
        }

        .contact-icon {
            font-size: 3rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        .contact-info h5 {
            font-size: 1.5rem;
            margin-bottom: 0.5rem;
        }

        .contact-info p {
            color: #777;
        }

        /* Форма обратной связи */
        #contactForm {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 10px 20px rgba(0,0,0,0.1);
            padding: 2rem;
        }

        .form-group {
            margin-bottom: 1.5rem;
        }

        .form-group label {
            font-weight: 600;
        }

        .form-group input,
        .form-group textarea {
            width: 100%;
            padding: 1rem;
            border: 1px solid #ccc;
            border-radius: 5px;
            outline: none;
        }

        .form-group button {
            background-color: var(--primary-color);
            color: #fff;
            padding: 1rem 2rem;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .form-group button:hover {
            background-color: #2980b9;
        }

        /* Отзывчивый дизайн */
        @media only screen and (max-width: 768px) {
            .row > div {
                margin-bottom: 2rem !important;
            }
        }
    </style>
</head>
<body>
    <!-- Шапка сайта -->
    <header id="main-nav">
        <div class="logo-holder">
            <img src="logo.jpg" alt="EcoTure" class="logo-img"/>
            <span class="logo-text">EcoTure</span>
        </div>
        <ul id="main-menu">
            <li class="main-menu-item"><a href="index.php">Главная</a></li>
            <li class="main-menu-item"><a href="uslugi.php">Услуги</a></li>
            <li class="main-menu-item"><a href="company.php">О компании</a></li>
            <li class="main-menu-item"><a href="contacts.php">Контакты</a></li>
            <li class="main-menu-item"><a href="cabinet.php">Личный кабинет</a></li>
        </ul>
    </header>

    <!-- Секция контактов -->
    <section id="contacts" class="py-5">
        <div class="container">
            <div class="section-header">
                <h2>Контактная информация</h2>
                <p>Свяжитесь с нами удобным для вас способом:</p>
            </div>
            
            <div class="row g-4">
                <div class="col-md-4 col-sm-12">
                    <div class="contact-card">
                        <i class="fa-solid fa-building contact-icon"></i>
                        <div class="contact-info">
                            <h5>Адрес офиса</h5>
                            <p>г. Секция, ул. Улица, д. 5676</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-card">
                        <i class="fa-solid fa-phone contact-icon"></i>
                        <div class="contact-info">
                            <h5>Телефон</h5>
                            <p>(999) 980-98-89</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4 col-sm-12">
                    <div class="contact-card">
                        <i class="fa-solid fa-envelope contact-icon"></i>
                        <div class="contact-info">
                            <h5>Электронная почта</h5>
                            <p>lolo@kikikiki.com</p>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="row mt-4">
                <div class="col-lg-6 mb-4">
                    <div class="ratio ratio-16x9">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2244.37678213!2d37.617697345670636!3d55.75581398055312!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46b54a636fae3fdad3d4b0!2z0JzQsNGA0LDQt9Cw0LDRjyDQoSwg0JzQvtGB0LrQstCwLCDQodCo0JA!5e0!3m2!1sru!2sru!4v1636682722716!5m2!1sru!2sru" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div id="contactForm" class="shadow rounded bg-white p-4">
                        <h5 class="mb-4">Напишите нам, если возникнут вопросы</h5>
                        <form>
                            <div class="form-group">
                                <label for="name">Имя</label>
                                <input type="text" class="form-control" id="name" placeholder="Ваше имя" required>
                            </div>
                            <div class="form-group">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" id="email" placeholder="example@example.com" required>
                            </div>
                            <div class="form-group">
                                <label for="phone">Телефон</label>
                                <input type="tel" class="form-control" id="phone" placeholder="+7 (___) ___ __ __">
                            </div>
                            <div class="form-group">
                                <label for="message">Сообщение</label>
                                <textarea class="form-control" id="message" rows="4" placeholder="Опишите вашу проблему или предложение..."></textarea>
                            </div>
                            <div class="form-group d-grid">
                                <button type="submit" class="btn btn-primary">Отправить</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script>
        // Простое уведомление о форме отправки сообщений
        const form = document.querySelector('#contactForm');
        if(form) {
            form.addEventListener('submit', function(event) {
                event.preventDefault(); // Предотвращаем перезагрузку страницы
                alert("Спасибо! Ваше сообщение отправлено.");
            });
        }
    </script>
</body>
</html>
