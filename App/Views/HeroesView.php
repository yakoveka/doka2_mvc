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
        <option title="переход на Интеллект" value="/heroes/MainCharacteristic/Intelligence">Интеллект</option>
        <option title="переход на ловкость" value="/heroes/MainCharacteristic/Agility">Ловкость</option>
        <option title="переход на силу" value="/heroes/MainCharacteristic/Strength">Сила</option>
    </select>
</form>

<div class="heroes">
    <?php foreach ($heroes as $hero): ?>
        <a href="/heroes/view/<?=str_replace(' ', '_', $hero->name)?>" class="heroItem"><img src="<?=$hero->pictureUrl?>" width="140" height="140"></a>
    <?php endforeach; ?>
</div>