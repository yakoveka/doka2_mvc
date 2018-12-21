<h1><?php echo $_SESSION['login']; ?></h1>
<p>
    Ник: <?php foreach ($data as $row){ echo $row->login; ?>
</p>
<p>
    Имя: <?php echo $row->first_name;?><br/>
    Фамилия: <?php echo $row->last_name;?><br/>
    Email: <?php echo $row->email;?><br/>
    <?php if($row->role=='admin' or $row->user=='moder'): ?>
    Роль: <?php echo $row->role;endif;}?><br/>
</p>
