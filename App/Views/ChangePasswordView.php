<p><?php if(!empty($error)) echo $error; ?></p>
<form action="/user/changePassword" method="post">
    <p><input type="password" name="newPassword" placeholder="Новый пароль" required></p>
    <p><input type="password" name="repeatNewPassword" placeholder="Повторите пароль" required></p>
    <input type="hidden" name="email" value="<?php if(!empty($data)) echo $data;?>"></p>
    <p><button  type="submit">Сменить пароль</button>
</form>