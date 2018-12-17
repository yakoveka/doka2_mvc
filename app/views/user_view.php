<h1><?php echo $_SESSION['login']; ?></h1>
<div>
    Ник: <?php foreach ($data as $row): echo $row['user_login']; ?>
</div>
<div>
    Имя: <?php echo $row['user_first_name']; ?>
</div>
<?php endforeach; ?>