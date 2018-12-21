<?php if($data==null): ?>
    <p>Вы успешно зарегистрировались!</p> <a href="/login">Войти</a>
<?php elseif($data=="register"): ?>
    <form class="form-signin" action="/register/writeUser" method="post">
        <input type="text" name="first_name" id="first_name" placeholder="Имя" required>
        <input type="text" name="last_name" id="last_name" placeholder="Фамилия" required>
        <input type="text" name="login" id="login" placeholder="Логин" required>
        <input type="text" name="email"  placeholder="Почта" required>
        <input type="password" name="password"  placeholder="Пароль" required>
        <button  type="submit_login">Зарегистрироваться</button>
    </form>
    <p><?php else: echo $data; ?></p>
<form class="form-signin" action="/register/writeUser" method="post">
    <input type="text" name="first_name" id="first_name" placeholder="Имя" required>
    <input type="text" name="last_name" id="last_name" placeholder="Фамилия" required>
    <input type="text" name="login" id="login" placeholder="Логин" required>
    <input type="text" name="email"  placeholder="Почта" required>
    <input type="password" name="password"  placeholder="Пароль" required>
    <button  type="submit_login">Зарегистрироваться</button>
</form>
<?php endif; ?>