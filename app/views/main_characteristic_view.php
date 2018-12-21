<h1>
    <?php
    if($data->main == 'Intelligence') echo "Интеллект";
    if($data->main == 'Agility') echo "Ловкость";
    if($data->main == 'Strength') echo "Сила";?></h1>
<a href="/heroes" class="main_char">Назад</a>
<div class="heroes">
    <a href="/heroes/<?php echo $row['name'] = str_replace(' ', '_', $row['name']);?>" class="hero_item"><img src="<?php echo $row['picture'];?>" width="140" height="140" title="<?php echo $row['name']=str_replace('_', ' ', $row['name']);?>"></a>
</div>
