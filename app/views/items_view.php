<div class="heroes">
    <?php foreach ($data as $item): ?>
        <a href="/items/view/<?=str_replace(' ', '_', $item->name)?>" class="hero_item"><img src="<?=$item->picture_url?>" width="85" height="64"></a>
    <?php endforeach; ?>
</div>