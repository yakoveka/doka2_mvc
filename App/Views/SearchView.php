<?php
if((empty($data[0]) and empty($data[1]))):?>
<p>По поисковому запросу '<?=$q?>' ничего не найдено</p>
<?php endif;?>
<?php if (!empty($data[0])):?>
    <p>Результаты поиска по запросу '<?= $q ?>':</p><br/>
    <?php foreach ($data[0] as $item): ?>
    <div class="searchResult">
        <a href="/heroes/view/<?php if (isset($item->name)) echo str_replace(' ', '_', $item->name);?>"><img src="<?=$item->pictureUrl?>" height="50" width="50"></a><br/>
    </div>
    <?php endforeach; ?>
<?php endif;?>
<?php if (!empty($data[1])): ?>
    <?php foreach ($data[1] as $item): ?>
    <div class="searchResult">
        <a href="/items/view/<?php if (isset($item->name)) echo str_replace(' ', '_', $item->name) ?>"><img src="<?=$item->pictureUrl?>" height="50" width="50"></a><br/>
    </div>
    <?php endforeach; ?>
<?php endif; ?>
