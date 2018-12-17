<?php foreach ($data as $row) { ?>
    <form action="/hero/confirm">
        Имя: <input type="text" name="hero_name" placeholder="<?php echo $row['name']; ?>" required><br />
        Главная характеристика: <input type="text" name="hero_main" placeholder="<?php echo $row['main']; ?>" required><br />
        Интеллект: <input type="text" name="hero_intelligence" placeholder="<?php echo $row['intelligence']; ?>" required><br />
        Ловкость: <input type="text" name="hero_agility" placeholder="<?php echo $row['agility']; ?>" required><br />
        Сила: <input type="text" name="hero_strength" placeholder="<?php echo $row['strength']; ?>" required><br />
        Урон: <input type="text" name="hero_damage" placeholder="<?php echo $row['damage']; ?>" required><br />
        Скорость: <input type="text" name="hero_movespeed" placeholder="<?php echo $row['movespeed']; ?>" required><br />
        Броня: <input type="text" name="hero_armor" placeholder="<?php echo $row['armor']; ?>" required><br />
        Способность 1: <input type="text" name="hero_ability1" placeholder="<?php echo $row['ability1']; ?>" required><br />
        Способнотсь 2: <input type="text" name="hero_ability2" placeholder="<?php echo $row['ability2']; ?>" required><br />
        Способнотсь 3: <input type="text" name="hero_ability3" placeholder="<?php echo $row['ability3']; ?>" required><br />
        Способнотсь 4: <input type="text" name="hero_ability4" placeholder="<?php echo $row['ability4']; ?>" required><br />
        Описание способности 1: <input type="text" name="hero_descr_abil1" placeholder="<?php echo $row['descr_abil1']; ?>" required><br />
        Описание способности 2: <input type="text" name="hero_descr_abil2" placeholder="<?php echo $row['descr_abil2']; ?>" required><br />
        Описание способности 3: <input type="text" name="hero_descr_abil3" placeholder="<?php echo $row['descr_abil3']; ?>" required><br />
        Описание способности 4: <input type="text" name="hero_descr_abil4" placeholder="<?php echo $row['descr_abil4']; ?>" required><br />
        Картинка героя: <input type="text" name="hero_picture" placeholder="<?php echo $row['picture']; ?>" required><br />
        Картинка способности 1: <input type="text" name="hero_picture_abil1" placeholder="<?php echo $row['picture_abil1']; ?>" required><br />
        Картинка способности 2: <input type="text" name="hero_picture_abil2" placeholder="<?php echo $row['picture_abil2']; ?>" required><br />
        Картинка способности 3: <input type="text" name="hero_picture_abil3" placeholder="<?php echo $row['picture_abil3']; ?>" required><br />
        Картинка способности 4: <input type="text" name="hero_picture_abil4" placeholder="<?php echo $row['picture_abil4']; ?>" required><br />
        Видео способности 1: <input type="text" name="hero_video_abil1" placeholder="<?php echo $row['video_abil1']; ?>" required><br />
        Видео способности 2: <input type="text" name="hero_video_abil2" placeholder="<?php echo $row['video_abil2']; ?>" required><br />
        Видео способности 3: <input type="text" name="hero_video_abil3" placeholder="<?php echo $row['video_abil3']; ?>" required><br />
        Видео способности 4: <input type="text" name="hero_video_abil4" placeholder="<?php echo $row['video_abil4']; ?>" required><br />
    </form>
<?php } ?>