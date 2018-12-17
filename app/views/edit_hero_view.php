<?php foreach ($data as $row) { ?>
    <form action="/heroes/edit/<?php echo $name = str_replace(' ', '_', $row['name']); ?>/confirm" class="edit_hero" method="post">
        Имя: <input type="text" name="hero_name" value="<?php echo $row['name']; ?>" ><br />
        Главная характеристика: <input type="text" name="hero_main" value="<?php echo $row['main']; ?>" ><br />
        Интеллект: <input type="text" name="hero_intelligence" value="<?php echo $row['intelligence']; ?>" ><br />
        Ловкость: <input type="text" name="hero_agility" value="<?php echo $row['agility']; ?>" ><br />
        Сила: <input type="text" name="hero_strength" value="<?php echo $row['strength']; ?>" ><br />
        Урон: <input type="text" name="hero_damage" value="<?php echo $row['damage']; ?>" ><br />
        Скорость: <input type="text" name="hero_movespeed" value="<?php echo $row['movespeed']; ?>" ><br />
        Броня: <input type="text" name="hero_armor" value="<?php echo $row['armor']; ?>" required><br />
        Способность 1: <input type="text" name="hero_ability1" value="<?php echo $row['ability1']; ?>" ><br />
        Способнотсь 2: <input type="text" name="hero_ability2" value="<?php echo $row['ability2']; ?>" ><br />
        Способнотсь 3: <input type="text" name="hero_ability3" value="<?php echo $row['ability3']; ?>"><br />
        Способнотсь 4: <input type="text" name="hero_ability4" value="<?php echo $row['ability4']; ?>" ><br />
        Описание способности 1: <textarea name="hero_descr_abil1" cols="100" rows="6"><?php echo $row['descr_abil1']; ?></textarea><br/>
        Описание способности 2: <textarea name="hero_descr_abil2" cols="100" rows="6"><?php echo $row['descr_abil2']; ?></textarea><br/>
        Описание способности 3: <textarea name="hero_descr_abil3" cols="100" rows="6"><?php echo $row['descr_abil3']; ?></textarea><br/>
        Описание способности 4: <textarea name="hero_descr_abil4" cols="100" rows="6"><?php echo $row['descr_abil4']; ?></textarea><br/>
        Картинка героя: <input type="text" name="hero_picture" value="<?php echo $row['picture']; ?>" ><br />
        Картинка способности 1: <input type="text" name="hero_picture_abil1" value="<?php echo $row['picture_abil1']; ?>" ><br />
        Картинка способности 2: <input type="text" name="hero_picture_abil2" value="<?php echo $row['picture_abil2']; ?>" ><br />
        Картинка способности 3: <input type="text" name="hero_picture_abil3" value="<?php echo $row['picture_abil3']; ?>" ><br />
        Картинка способности 4: <input type="text" name="hero_picture_abil4" value="<?php echo $row['picture_abil4']; ?>" ><br />
        Видео способности 1: <input type="text" name="hero_video_abil1" value="<?php echo $row['video_abil1']; ?>" ><br />
        Видео способности 2: <input type="text" name="hero_video_abil2" value="<?php echo $row['video_abil2']; ?>" ><br />
        Видео способности 3: <input type="text" name="hero_video_abil3" value="<?php echo $row['video_abil3']; ?>" ><br />
        Видео способности 4: <input type="text" name="hero_video_abil4" value="<?php echo $row['video_abil4']; ?>" ><br />
        <input type="submit" value="Принять">
    </form>
<?php } ?>