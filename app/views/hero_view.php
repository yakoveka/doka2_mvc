<h1 class="header_name">
    <?php echo $hero->name; ?>
</h1>
<?php if (!empty($_SESSION['role']) and ($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'moder')) : ?>
    <form class="edit" action="/heroes/edit/<?php echo str_replace(' ', '_', $hero->name); ?>" method="post">
        <button type="submit">Редактировать</button>
    </form>
<?php endif; ?>
<div id="overviewInner">
    <div id="overviewHeroLeft">
        <div class="heroIcon">
            <img src="<?php echo $hero->picture_url; ?>" width="170" height="200">
        </div>
        <div id="hero_overview">
            <img id="overviewIcon" title="Intelligence"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_int.png" width="33" height="33">
            <div id="overview_int"
                 class="overview_stat"><?php echo $hero->intelligence; ?></div>
            <img id="overviewIcon1" title="Intelligence"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_agi.png" width="33" height="33">
            <div id="overview_agil" class="overview_stat"><?php echo $hero->agility; ?></div>
            <img id="overviewIcon2" title="Strength"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_str.png" width="33" height="33">
            <div id="overview_str" class="overview_stat"><?php echo $hero->strength; ?></div>
            <img id="overviewIcon3" title="Attack"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_attack.png" width="46"
                 height="35">
            <div id="overview_att" class="overview_stat"><?php echo $hero->damage; ?></div>
            <img id="overviewIcon4" title="Movespeed"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_speed.png" width="63"
                 height="39">
            <div id="overview_movespeed"
                 class="overview_stat"><?php echo $hero->movespeed; ?></div>
            <img id="overviewIcon5" title="Armor"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_defense.png" width="39"
                 height="37">
            <div id="overview_armor" class="overview_stat"><?php echo $hero->armor; ?></div>
        </div>
    </div>
    <div id="overviewHeroAbilities">
        <?php foreach ($hero->abilities as $ability): ?>
            <div class="overviewAbilityRow">
                <div class="abilityIconHolder">
                    <img class="overviewAbilityImg" src="<?php echo $ability->picture_url; ?>">
                </div>
                <div class="overviewAbilityRowDescription">
                    <h2><?php echo $ability->name; ?></h2>
                    <p><?php echo $ability->description; ?></p>
                </div>
                <div class="video_of_ability">
                    <iframe src="<?php echo $ability->video_url; ?>"
                            width="560" height="315" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

</div>
