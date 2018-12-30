<?php if(!empty($data))?>
<p><?php echo $data; ?></p>
<form class="form-signin" action="/login/check" method="post">
    <input type="text" name="login" id="login" placeholder="Логин" required>
    <input type="password" name="password"  placeholder="Пароль" required>
    <button  type="submit">Войти</button>
</form>
<p>Забыли пароль?<a href="/user/forgot">Тык.</a></p>