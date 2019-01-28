<?php if(!empty($data))?>
<p><?php echo $data; ?></p>
<form class="login-form" action="/login/Check" method="post">
    <input type="text" name="login" id="login" placeholder="Логин" required>
    <input type="password" name="password"  placeholder="Пароль" required>
    <button  type="submit">Войти</button><br/>
    <p>Забыли пароль?<a href="/user/ForgotView">Тык.</a></p>
</form>
