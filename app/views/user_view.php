<h1><?php echo $_SESSION['login']; foreach ($data as $row): ?></h1>
<p>
    Ник: <?= $row->login?>
</p>
<p>
    Имя: <?=$row->first_name?><br/>
    Фамилия: <?=$row->last_name?><br/>
    Email: <?=$row->email?><br/>
    <?php if($row->role=='admin' or $row->role=='moder'): ?>
    Роль: <?=$row->role;endif;?><br/>
</p>
<?php endforeach;?>
