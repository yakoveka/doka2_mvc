<h1 class="header_name"><?php foreach ($data as $row)
        echo $row['name']; ?></h1>
<div id="overviewInner">
    <div id="overviewHeroLeft">
        <div class="heroIcon">
            <img src="<?php foreach ($data as $row) echo $row['picture']; ?>" width="170" height="200">
        </div>
        <div id="hero_overview">
            <img id="overviewIcon" title="Intelligence"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_int.png" width="33" height="33">
            <div id="overview_int"
                 class="overview_stat"><?php foreach ($data as $row) echo $row['intelligence']; ?></div>
            <img id="overviewIcon1" title="Intelligence"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_agi.png" width="33" height="33">
            <div id="overview_agil" class="overview_stat"><?php foreach ($data as $row) echo $row['agility']; ?></div>
            <img id="overviewIcon2" title="Strength"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_str.png" width="33" height="33">
            <div id="overview_str" class="overview_stat"><?php foreach ($data as $row) echo $row['strength']; ?></div>
            <img id="overviewIcon3" title="Attack"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_attack.png" width="46" height="35">
            <div id="overview_att" class="overview_stat"><?php foreach ($data as $row) echo $row['damage']; ?></div>
            <img id="overviewIcon4" title="Movespeed"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_speed.png" width="63" height="39">
            <div id="overview_movespeed"
                 class="overview_stat"><?php foreach ($data as $row) echo $row['movespeed']; ?></div>
            <img id="overviewIcon5" title="Armor"
                 src="http://cdn.dota2.com/apps/dota2/images/heropedia/overviewicon_defense.png" width="39" height="37">
            <div id="overview_armor" class="overview_stat"><?php foreach ($data as $row) echo $row['armor']; ?></div>
        </div>
    </div>
    <div id="overviewHeroAbilities">
        <div class="overviewAbilityRow">
            <div class="overviewAbilityRowDescription">
                <h2><?php foreach ($data as $row) echo $row['ability1']; ?></h2>
                <p><?php foreach ($data as $row) echo $row['descr_abil1']; ?></p>
            </div>
        </div>
        <div class="overviewAbilityRow">
            <div class="overviewAbilityRowDescription">
                <h2><?php foreach ($data as $row) echo $row['ability2']; ?></h2>
                <p><?php foreach ($data as $row) echo $row['descr_abil2']; ?></p>
            </div>
        </div>
        <div class="overviewAbilityRow">
            <div class="overviewAbilityRowDescription">
                <h2><?php foreach ($data as $row) echo $row['ability3']; ?></h2>
                <p><?php foreach ($data as $row) echo $row['descr_abil3']; ?></p>
            </div>
        </div>
        <div class="overviewAbilityRow">
            <div class="overviewAbilityRowDescription">
                <h2><?php foreach ($data as $row) echo $row['ability4']; ?></h2>
                <p><?php foreach ($data as $row) echo $row['descr_abil4']; ?></p>
            </div>
        </div>
    </div>
</div>