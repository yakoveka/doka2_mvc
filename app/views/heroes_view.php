<?php use \App\Hero; ?>
<h1>hero</h1>
<p>
    <table>
    Таблица
    <tr><td>Имя</td><td>Интеллект</td><td>Скорость передвижения</td><td>Броня</td></tr>
    <?php
    /*$hero = new Model_Heroes();
    $hero1 = $hero->get_data(1);*/
    foreach ($data as $row)
    {echo '<tr><td>'.$row['name'].'</td>'.'<td>'.$row['intelligence'].'</tr></tr>';}

    ?>
</table>
</p>