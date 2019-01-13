<?php if(!empty($data))?>
<p><?php echo $data; ?></p>
<form class="login-form" action="/login/check" method="post">
    <input type="text" name="login" id="login" placeholder="Логин" required>
    <input type="password" name="password"  placeholder="Пароль" required>
    <p><button  type="submit">Войти</button></p><br/>
    <p>Забыли пароль?<a href="/user/forgot_view">Тык.</a></p>
</form>
