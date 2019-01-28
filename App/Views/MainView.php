<h1>Welcome</h1>
<a href="/">doka2.common</a>
<?php if(!empty($_SESSION['login']) and $_SESSION['role']=='admin'):?>
<div class="showUsers">
    <a href="/user/ManageUsers">Список пользователей</a>
</div>
<?php endif;?>
<? echo $data;?>