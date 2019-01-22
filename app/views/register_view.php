<?php if ($data == null): ?>
    <p>Вы успешно зарегистрировались!</p> <a href="/login">Войти</a>
<?php elseif ($data == "Register"): ?>
    <form class="login-form" action="/register/writeUser" method="post">
        <input type="text" name="first_name" id="first_name" placeholder="Имя" required>
        <input type="text" name="last_name" id="last_name" placeholder="Фамилия" required>
        <input type="text" name="login" id="login" placeholder="Логин" required>
        <input type="text" name="email" placeholder="Почта" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <?php else:?>
    <p><?=$data?></p>
    <form class="login-form" action="/register/writeUser" method="post">
        <input type="text" name="first_name" id="first_name" placeholder="Имя" required>
        <input type="text" name="last_name" id="last_name" placeholder="Фамилия" required>
        <input type="text" name="login" id="login" placeholder="Логин" required>
        <input type="text" name="email" placeholder="Почта" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
<?php endif; ?>