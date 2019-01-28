<div class="heroes">
    <?php foreach ($items as $item): ?>
        <a href="/items/view/<?=str_replace(' ', '_', $item->name)?>" class="heroItem"><img src="<?=$item->pictureUrl?>" width="85" height="64"></a>
    <?php endforeach; ?>
</div>