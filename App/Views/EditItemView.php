<div id="editHero">
    <form action="/items/ConfirmEdit/<?php echo str_replace(' ', '_', $data->name); ?>" class="editHero" method="post">
        <input type="hidden" name="itemId" value="<?= $data->id ?>">
        Имя: <input type="text" name="itemName" value="<?=$data->name ?>"><br/>
        Стоимость: <input type="text" name="itemPrice" value="<?=$data->price?>"><br/>
        <?php if($data->mana!=null):?>
            Используемая мана: <input type="text" name="itemMana" value="<?=$data->mana?>"><br/>
        <?php else:?>
            Используемая мана: <input type="text" name="itemMana" value="<?=null?>"><br/>
        <?php endif;?>
        <?php if($data->reloadTime!=null):?>
            Время перезарядки: <input type="text" name="itemReloadTime" value="<?=$data->reloadTime?>"><br/>
        <?php else:?>
            Время перезарядки: <input type="text" name="itemReloadTime" value="<?=null?>"><br/>
        <?php endif;?>
        <?php if($data->description!=null):?>
            Описание: <textarea name="itemDescription" cols="100" rows="6"><?=$data->description?></textarea><br/>
        <?php else:?>
            Описание: <textarea name="itemDescription" cols="100" rows="6"><?=null?></textarea><br/>
        <?php endif;?>
        Характеристики: <textarea name="itemCharacteristics" cols="100" rows="6"><?=$data->characteristics?></textarea><br/>
        Картинка предмета: <input type="text" name="itemPicture" value="<?= $data->pictureUrl ?>"><br/>
        <input type="submit" value="Принять">
    </form>
</div>