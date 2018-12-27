<h1>
    <?php foreach ($data as $row){
    if($row->mainAbility == 'Intelligence') {echo "Интеллект"; break;}
    if($row->mainAbility == 'Agility') {echo "Ловкость"; break;}
    if($row->mainAbility == 'Strength') {echo "Сила";break;} }?></h1>
<a href="/heroes" class="main_char">Назад</a>
<div class="heroes">
    <?php foreach ($data as $row): ?>
    <a href="/heroes/<?php echo $row->name = str_replace(' ', '_', $row->name);?>" class="hero_item"><img src="<?php echo $row->picture_url;?>" width="140" height="140" title="<?php echo $row->name=str_replace('_', ' ', $row->name);?>"></a>
    <?php endforeach; ?>
</div>
