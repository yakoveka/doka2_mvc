<div class="heroHeader">
    <h1><?= $hero->name; ?></h1>
</div>
<?php if (!empty($_SESSION['role']) and ($_SESSION['role'] == 'admin' or $_SESSION['role'] == 'moder')) : ?>
    <div id="edit">
        <a href="/heroes/edit/<?= str_replace(' ', '_', $hero->name) ?>">Редактировать</a>
    </div>
<?php endif; ?>
<div id="overviewInner">
    <div id="overviewHeroLeft">
        <div class="heroIcon">
            <img src="<?php echo $hero->pictureUrl; ?>" width="235" height="272">
        </div>
        <div id="heroOverviewPrimaryStats">
            <img id="overviewIconInt" title="Intelligence"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_int.png" width="33" height="33">
            <div class="overviewStatVal" id="overviewIntVal"><?php echo $hero->intelligence; ?></div>
            <img id="overviewIconAgi" title="Agility"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_agi.png" width="33" height="33">
            <div class="overviewStatVal" id="overviewAgiVal"><?php echo $hero->agility; ?></div>
            <img id="overviewIconStr" title="Strength"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_str.png" width="33" height="33">
            <div class="overviewStatVal" id="overviewStrVal"><?php echo $hero->strength; ?></div>
            <img id="overviewIconAttack" title="Attack"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_attack.png" width="46"
                 height="35">
            <div class="overviewStatVal" id="overviewAttackVal"><?php echo $hero->damage; ?></div>
            <img id="overviewIconSpeed" title="Movespeed"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_speed.png" width="63"
                 height="39">
            <div class="overviewStatVal" id="overviewSpeedVal"><?php echo $hero->movespeed; ?></div>
            <img id="overviewIconDefense" title="Armor"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_defense.png" width="39"
                 height="37">
            <div class="overviewStatVal" id="overviewDefenseVal"><?php echo $hero->armor; ?></div>
        </div>
    </div>
    <div id="overviewHeroAbilities">
        <?php foreach ($hero->abilities as $ability): ?>
            <div class="overviewAbilityRow">
                <div class="abilityIconHolder">
                    <img class="overviewAbilityImg" src="<?php echo $ability->pictureUrl; ?>">
                </div>
                <div class="overviewAbilityRowDescription">
                    <h2><?php echo $ability->name; ?></h2>
                    <p><?php echo $ability->description; ?></p>
                </div>
                <div class="videoOfAbility">
                    <iframe src="<?php echo $ability->videoUrl; ?>"
                            width="560" height="315" frameborder="0" allowfullscreen></iframe>
                </div>
            </div>
        <?php endforeach; ?>
    </div>
    <div id="comments">
    <?php if (isset($comment)): ?>
            <?php foreach ($comment as $single): ?>
                <div class="singleComment">
                    <div class="overviewCommentLeft">
                        <?= $single->user ?><br/>
                        <?= date("d.m.Y", strtotime($single->date)) ?><br/>
                        <?= date("h:i", strtotime($single->date)) ?>
                    </div>
                    <div class="overviewCommentRight">
                        <?= $single->comment ?>
                    </div>
                </div>
            <?php endforeach; ?>
    <?php endif; ?>
    </div>
    <?php if (isset($_SESSION['activated']) and $_SESSION['activated'] == 1): ?>
        <div id="comment">
            <form action="/heroes/comment/<?=str_replace(' ', '_', $hero->name)?>" method="post">
                <input type="hidden" name="heroId" value="<?= $hero->name ?>">
                Оставьте ваш комментарий: <br/><textarea name="comment"></textarea><br/>
                <button type="submit">Комментировать</button>
            </form>
        </div>
    <?php else: ?>
        <h4>Комментировать могут только зарегистрированные и подтвердившие почту пользователи!</h4>
    <?php endif; ?>
</div>
