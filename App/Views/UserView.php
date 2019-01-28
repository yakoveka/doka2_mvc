<h1><?=$user->login?></h1>
<p>
    Ник: <?= $user->login?><br/>
    Имя: <?=$user->firstName?><br/>
    Фамилия: <?=$user->lastName?><br/>
    Email: <?=$user->email?><br/>
    <?php if($user->role=='admin' or $user->role=='moder'): ?>
    Роль: <?=$user->role;endif;?>
</p>
