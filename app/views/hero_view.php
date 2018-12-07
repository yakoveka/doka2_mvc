<h1><?php foreach ($data as $row)
    echo $row['name']; ?></h1>
<p>
<table>
    Таблица
    <tr><td>Имя</td><td>Интеллект</td><td>Ловкость</td><td>Сила</td><td>Урон</td><td>Скорость передвижения</td><td>Броня</td></tr>
    <?php
    foreach ($data as $row)
    {echo '<tr><td>'.$row['name'].'</td><td>'.$row['intelligence'].'</td><td>'.$row['agility'].'</td><td>'.$row['strength'].'</td><td>'.$row['damage'].'</td><td>'.$row['movespeed'].'</td><td>'.$row['armor'].'</td></tr>';}

    ?>
</table>
<table>
    <tr><td><?php foreach ($data as $row) echo $row['ability1'];?></td><td><?php foreach ($data as $row) echo $row['descr_abil1'];?></td></tr>
</table>
<table>
    <tr><td><?php foreach ($data as $row) echo $row['ability2'];?></td><td><?php foreach ($data as $row) echo $row['descr_abil2'];?></td></tr>
</table>
<table>
    <tr><td><?php foreach ($data as $row) echo $row['ability3'];?></td><td><?php foreach ($data as $row) echo $row['descr_abil3'];?></td></tr>
</table>
<table>
    <tr><td><?php foreach ($data as $row) echo $row['ability4'];?></td><td><?php foreach ($data as $row) echo $row['descr_abil4'];?></td></tr>
</table>
</p>