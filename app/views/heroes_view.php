<h1 >Герои</h1>
<p>
    <table>
    Таблица героев<br/>
    <a href="/heroes/main_characteristic/intelligence" class="main_char">Интеллект</a>
    <a href="/heroes/main_characteristic/agility" class="main_char">Ловкость</a>
    <a href="/heroes/main_characteristic/strength" class="main_char">Сила</a>
    <tr><td>Имя</td></tr>
    <?php
    foreach ($data as $row) {
        echo '<tr><td><a href="/heroes/hero/'.$row['id'].'">'.$row['name'].'</a></td></tr>';}
    ?>
</table>
</p>