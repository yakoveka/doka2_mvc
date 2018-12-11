<h1><?php foreach ($data as $row)
    {if($row['main'] == 'Intelligence') {echo "Интеллект"; break;}
        if($row['main'] == 'Agility') {echo "Ловкость"; break;}
        if($row['main'] == 'Strength') {echo "Сила"; break;}}?></h1>
<a href="/heroes" class="main_char">Назад</a>
<div class="heroes">
<?php
    foreach ($data as $row)
    {echo '<a href="/heroes/'.$row['id'].'" class="hero_item">'.$row['name'].'</a>';} ?>
</div>
