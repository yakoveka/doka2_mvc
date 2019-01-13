<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset=UTF-8"/>
    <title>Learning dota2</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/css/style.css">
    <link rel="shortcut icon" type="image/x-icon" href="/images/favicon.ico">
</head>

<body>
<div id="wrapper">
    <header>
        <div class="header-container">
            <div class="logo">
                <a href="/"><img src="/images/header_logo.jpg" width="130" height="130" border="0"></a>
            </div>
            <nav>
                <?php if (empty($_SESSION['login'])): ?>
                    <ul>
                        <li class="login"><a href="/login">Войти</a></li>
                        <li class="login"><a href="/register">Зарегистрироваться</a></li>
                    </ul>
                <?php elseif (!empty($_SESSION['login'])): ?>
                    <ul>
                        <li class="login"><a    href="/user/view/<?php echo $_SESSION['login'] ?>"><?php echo $_SESSION['login'] ?></a>
                        </li>
                        <li class="login"><a href="/login/logout">Выйти</a></li>
                    </ul>
                <?php endif; ?>
                <div id="menu">
                    <ul class="main-menu">
                        <li><a href="/">Главная</a></li>
                        <li><a href="/heroes">Герои</a></li>
                        <li><a href="/posts">Посты</a></li>
                        <li><a href="/items">Шмотки</a></li>
                    </ul>
                </div>
            </nav>
        </div>
    </header>
    <div id="page">
        <div id="content">
            <div class="box">
                <?php include 'app/views/' . $content_view; ?>
            </div>
        </div>
    </div>
    <div id="page-bottom">
        <div id="page-bottom-sidebar">
            <h3>Ссылочки, заходим, подписываемся</h3>
            <ul class="list">
                <li><a href="https://vk.com/yakoveka">VK</a></li>
                <li><a href="https://instagram.com/yakoveka">Instagram</a></li>
                <li><a href="https://twitter.com/yakoveka">Twitter</a></li>
                <li>email: yakoveka@gmail.com</li>
            </ul>
        </div>
    </div>
</div>
<div id="footer">
    <a href="/">дадая</a> &copy; 2018</a>
</div>
</body>
</html>