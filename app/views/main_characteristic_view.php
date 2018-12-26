<h1>
    <?php foreach ($data as $row)
    if($row->mainAbility == 'Intelligence') echo "Интеллект";
    if($row->mainAbility == 'Agility') echo "Ловкость";
    if($row->mainAbility == 'Strength') echo "Сила";?></h1>
<a href="/heroes" class="main_char">Назад</a>
<div class="heroes">
    <a href="/heroes/<?php echo $row->name = str_replace(' ', '_', $row->name);?>" class="hero_item"><img src="<?php echo $row->picture_url;?>" width="140" height="140" title="<?php echo $row->name=str_replace('_', ' ', $row->name);?>"></a>
</div>
