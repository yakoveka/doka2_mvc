<script language="JavaScript" type="text/javascript">
    function linklist(what) {
        var selectedopt = what.options[what.selectedIndex]
        if (document.getElementById && selectedopt.getAttribute("target") == "new")
            window.open(selectedopt.value)
        else
            window.location = selectedopt.value
    }
</script>
<h1>Герои</h1>
<form name="menu"><select class="selector_main_char" name="s1" onchange="linklist(document.menu.s1)">
        <option value="#">Главная характеристика</option>
        <option title="переход на Интеллект" value="/heroes/main_characteristic/Intelligence">Интеллект</option>
        <option title="переход на ловкость" value="/heroes/main_characteristic/Agility">Ловкость</option>
        <option title="переход на силу" value="/heroes/main_characteristic/Strength">Сила</option>
    </select>
</form>
<div class="heroes">
    <?php
    foreach ($data as $row) { ?>
    <a href="/heroes/<?php echo $row->name = str_replace(' ', '_', $row->name);?>" class="hero_item"><img src="<?php echo $row->picture_url;?>" width="140" height="140" title="<?php echo $row->name=str_replace('_', ' ', $row->name);?>"></a>
    <?php } ?>
</div>