<h1>hero</h1>
<a href="/heroes" class="main_char">Назад</a>
<p>
<table>
    Таблица
    <tr><td>Имя</td><td>Интеллект</td><td>Ловкость</td><td>Сила</td><td>Урон</td><td>Скорость передвижения</td><td>Броня</td></tr>
    <?php
    foreach ($data as $row)
    {echo '<tr><td><a href="/heroes/hero/'.$row['id'].'">'.$row['name'].'</a></td><td>'.$row['intelligence'].'</td><td>'.$row['agility'].'</td><td>'.$row['strength'].'</td><td>'.$row['damage'].'</td><td>'.$row['movespeed'].'</td><td>'.$row['armor'].'</td></tr>';}

    ?>
</table>
</p>