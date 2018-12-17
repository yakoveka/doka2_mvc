<h1><?php foreach ($data as $row)
    {if($row['main'] == 'Intelligence') {echo "Интеллект"; break;}
        if($row['main'] == 'Agility') {echo "Ловкость"; break;}
        if($row['main'] == 'Strength') {echo "Сила"; break;}}?></h1>
<a href="/heroes" class="main_char">Назад</a>
<div class="heroes">
<?php
    foreach ($data as $row)
    { ?> <a href="/heroes/<?php echo $row['name'] = str_replace(' ', '_', $row['name']);?>" class="hero_item"><img src="<?php echo $row['picture'];?>" width="140" height="140" title="<?php echo $row['name']=str_replace('_', ' ', $row['name']);?>"></a>
    <?php }?>
</div>
