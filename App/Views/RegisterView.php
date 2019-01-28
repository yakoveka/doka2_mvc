<?php if ($data == null): ?>
    <p>Вы успешно зарегистрировались!</p> <a href="/login">Войти</a>
<?php elseif ($data == "Register"): ?>
    <form class="login-form" action="/register/WriteUser" method="post">
        <input type="text" name="firstName" id="firstName" placeholder="Имя" required>
        <input type="text" name="lastName" id="lastName" placeholder="Фамилия" required>
        <input type="text" name="login" id="login" placeholder="Логин" required>
        <input type="text" name="email" placeholder="Почта" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
    <?php else:?>
    <p><?=$data?></p>
    <form class="login-form" action="/register/WriteUser" method="post">
        <input type="text" name="firstName" id="firstName" placeholder="Имя" required>
        <input type="text" name="lastName" id="lastName" placeholder="Фамилия" required>
        <input type="text" name="login" id="login" placeholder="Логин" required>
        <input type="text" name="email" placeholder="Почта" required>
        <input type="password" name="password" placeholder="Пароль" required>
        <button type="submit">Зарегистрироваться</button>
    </form>
<?php endif; ?>