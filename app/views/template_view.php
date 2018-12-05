<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <title>Learning dota2</title>
    <link href="http://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet" type="text/css" />
    <link href="http://fonts.googleapis.com/css?family=Kreon" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" type="text/css" href="/css/style.css" />
    <script src="/js/jquery-1.6.2.js" type="text/javascript"></script>
    <script type="text/javascript">
        function random(number) {

            return Math.floor( Math.random()*(number+1) );
        };
        $(document).ready(function() {
            var quotes = $('.quote');
            quotes.hide();
            var qlen = quotes.length;
            $( '.quote:eq(' + random(qlen-1) + ')' ).show();
        });
    </script>
</head>
<body>
<div id="wrapper">
    <div id="header">
        <div id="menu">
            <ul>
                <li class="first active"><a href="/">Главная</a></li>
                <li><a href="/heroes">Герои</a></li>
                <li><a href="/posts">Посты</a></li>
                <li class="last"><a href="/items">Шмотки</a></li>
            </ul>
            <br class="clearfix" />
        </div>
    </div>
    <div id="page">
        <div id="sidebar">
            <div class="side-box">
                <h3>Привет</h3>
                <p align="justify" class="quote">
                    Заходи, не стесняйся
                </p>
            </div>
            <div class="side-box">
                <h3>Основное меню</h3>
                <ul class="list">
                    <li class="first "><a href="/">Главная</a></li>
                    <li><a href="/heroes">Герои</a></li>
                    <li><a href="/posts">Посты</a></li>
                    <li class="last"><a href="/items">Шмотки</a></li>
                </ul>
            </div>
        </div>
        <div id="content">
            <div class="box">
                <?php include 'app/views/'.$content_view; ?>
            </div>
            <br class="clearfix" />
        </div>
        <br class="clearfix" />
    </div>
    <div id="page-bottom">
        <div id="page-bottom-sidebar">
            <h3>Ссылочки, заходим, подписываемся</h3>
            <ul class="list">
                <li class="first"><a href="https://vk.com/yakoveka">VK</a></li>
                <li><a href="https://instagram.com/yakoveka">Instagram</a></li>
                <li><a href="https://twitter.com/yakoveka">Twitter</a></li>
                <li class="last">email: yakoveka@gmail.com</li>
            </ul>
        </div>
        <div id="page-bottom-content">
            <h3>Обо мне</h3>
            <p>
                хд)
            </p>
        </div>
        <br class="clearfix" />
    </div>
</div>
<div id="footer">
    <a href="/">дадая</a> &copy; 2018</a>
</div>
</body>
</html>