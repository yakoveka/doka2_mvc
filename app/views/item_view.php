<h1><?= $item->name; ?></h1>
<?php if (!empty($_SESSION['role']) and ($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'moder')) : ?>
    <div id="edit">
        <a href="/items/edit/<?= str_replace(' ', '_', $item->name) ?>">Редактировать</a>
    </div>
<?php endif; ?>
<div id="itemsHeader">
    <div id="itemTopRow">
        <div class="itemName">
            <?=$item->name?>
        </div>
        <div class="goldIcon">
            <img src="http://cdn.dota2.com/apps/dota2/images/tooltips/gold.png" width="25" height="17">
        </div>
        <div class="goldCost">
            <?=$item->price?>
        </div>
    </div>
    <div class="largeItemImg">
        <img src="<?=$item->picture_url?>" height="138" width="182">
    </div>
    <div class="itemBoxDetails">
        <div class="detailBoxCol detailBoxDesc">
            <?php if($item->description!=null):?>
            <?=$item->description?>
            <?php endif;?>
        </div>
        <div class="detailBoxCol">
            <?=$item->characteristics?><br/>
            <?php if($item->mana!=null): ?>
            Расход маны: <?=$item->mana?><br/>
            <?php endif;?>
            <?php if($item->reloadTime!=null): ?>
                Перезарядка: <?=$item->reloadTime?><br/>
            <?php endif;?>
        </div>
    </div>
</div>