<!DOCTYPE HTML>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <title>TESTSHOP</title>
        <meta name="description" content="Описание магазина">
        <meta name="keywords" content="test, shop">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    </head
    <body>
        <div>
            <!-- http://online-letters.ru/letters/cyrillic.html -->
            <img src="/template/img/logo.png" width="150px">
        </div>
        <hr>
        <div>
            <b>H E A D E R</b>
        </div>
        <hr>
        <a href="/">Главная</a>
        <a href="/all">Все товары</a>
        <a href="/cart">Корзина (<span class="itemCount"><?php echo Cart::countItem(); ?></span>)</a>
        <a href="/any">Тест 404</a>
        <hr>
        <p>Добро пожаловать, <?php echo User::checkLoggedName(); ?>!</p>
        <?php if (User::checkLoggedName() == "Гость"): ?>
            <a href="/user/login">Вход</a>
            <a href="/user/registration">Регистрация</a>
        <?php else: ?>
            <a href="/account">Личный кабинет</a>
            <a href="/user/logout">Выход</a>
        <?php endif; ?>
        <hr>