<?php if(!empty($data))?>
<?php echo $data; ?>
<form class="form-signin" action="/login/check" method="post">
    <input type="text" name="login" id="login" placeholder="Логин" required>
    <input type="password" name="password"  placeholder="Пароль" required>
    <button  type="submit">Войти</button>
</form>