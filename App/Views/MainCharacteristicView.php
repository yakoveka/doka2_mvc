<h1>
    <?php foreach ($heroes as $hero){
    if($hero->mainAbility == 'Intelligence') {echo "Интеллект"; break;}
    if($hero->mainAbility == 'Agility') {echo "Ловкость"; break;}
    if($hero->mainAbility == 'Strength') {echo "Сила";break;} }?></h1>
<a href="/heroes" class="mainCharacteristic">Назад</a>
<div class="heroes">
    <?php foreach ($data as $hero): ?>
    <a href="/heroes/<?php echo $hero->name = str_replace(' ', '_', $hero->name);?>" class="heroItem"><img src="<?php echo $hero->pictureUrl;?>" width="140" height="140" title="<?php echo $hero->name=str_replace('_', ' ', $hero->name);?>"></a>
    <?php endforeach; ?>
</div>
