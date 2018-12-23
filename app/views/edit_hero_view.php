<?php if(empty($_SESSION['login']) or $_SESSION['role'] == "default")
{
    header("Location: /");
    die();
}?>
<form action="/heroes/edit/<?php echo str_replace(' ', '_', $data->name); ?>/confirm" class="edit_hero" method="post">
    Имя: <input type="text" name="heroName" value="<?php echo $data->name; ?>"><br/>
    Главная характеристика: <input type="text" name="heroMainAbility" value="<?= $data->mainAbility; ?>"><br/>
    Интеллект: <input type="text" name="heroIntelligence" value="<?= $data->intelligence; ?>"><br/>
    Ловкость: <input type="text" name="heroAgility" value="<?= $data->agility; ?>"><br/>
    Сила: <input type="text" name="heroStrength" value="<?= $data->strength; ?>"><br/>
    Урон: <input type="text" name="heroDamage" value="<?= $data->damage; ?>"><br/>
    Скорость: <input type="text" name="heroMovespeed" value="<?= $data->movespeed; ?>"><br/>
    Броня: <input type="text" name="heroArmor" value="<?= $data->armor; ?>"><br/>
    Картинка героя: <input type="text" name="heroPicture" value="<?=$data->picture_url; ?>"><br/>
    <?php $i=1; foreach ($data->abilities as $ability): ?>
            <input type="hidden" name="abilityId<?=$i?>" value="<?= $ability->id?>">
            Способность <?= $i ?>: <input type="text" name="heroAbility<?= $i ?>" value="<?= $ability->name ?>"><br/>
            Описание способности <?=$i?>: <textarea name="heroDescriptionOfAbility<?=$i?>" cols="100" rows="6"><?=$ability->description?></textarea><br/>
            Картинка способности <?=$i?>: <input type="text" name="heroPictureOfAbility1<?=$i?>" value="<?=$ability->picture_url?>"><br/>
            Видео способности <?=$i?>: <input type="text" name="heroVideoOfAbility<?=$i?>" value="<?php echo $ability->video_url; $i+=1?>"><br/>
    <?php endforeach; ?>
    <input type="submit" value="Принять">
</form>