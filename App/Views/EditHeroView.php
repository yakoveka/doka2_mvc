<div id="editHero">
    <form action="/heroes/ConfirmEdit/<?php echo str_replace(' ', '_', $hero->name); ?>/confirm" class="editHero" method="post">
        <input type="hidden" name="heroId" value="<?= $hero->id ?>">
        Имя: <input type="text" name="heroName" value="<?php echo $hero->name; ?>"><br/>
        Главная характеристика: <input type="text" name="heroMainAbility" value="<?= $hero->mainAbility; ?>"><br/>
        Интеллект: <input type="text" name="heroIntelligence" value="<?= $hero->intelligence; ?>"><br/>
        Ловкость: <input type="text" name="heroAgility" value="<?= $hero->agility; ?>"><br/>
        Сила: <input type="text" name="heroStrength" value="<?= $hero->strength; ?>"><br/>
        Урон: <input type="text" name="heroDamage" value="<?= $hero->damage; ?>"><br/>
        Скорость: <input type="text" name="heroMovespeed" value="<?= $hero->movespeed; ?>"><br/>
        Броня: <input type="text" name="heroArmor" value="<?= $hero->armor; ?>"><br/>
        Картинка героя: <input type="text" name="heroPicture" value="<?= $hero->pictureUrl; ?>"><br/>
        <?php $i = 1;
        foreach ($hero->abilities as $ability): ?>
            <input type="hidden" name="abilityId<?= $i ?>" value="<?= $ability->id ?>">
            Способность <?= $i ?>: <input type="text" name="heroAbility<?= $i ?>" value="<?= $ability->name ?>"><br/>
            Описание способности <?= $i ?>: <textarea name="heroDescriptionOfAbility<?= $i ?>" cols="100" rows="6"><?= $ability->description ?></textarea><br/>
            Картинка способности <?= $i ?>: <input type="text" name="heroPictureOfAbility1<?= $i ?>" value="<?= $ability->pictureUrl ?>"><br/>
            Видео способности <?= $i ?>: <input type="text" name="heroVideoOfAbility<?= $i ?>" value="<?php echo $ability->videoUrl;
                                                $i += 1 ?>"><br/>
        <?php endforeach; ?>
        <input type="submit" value="Принять">
    </form>
</div>