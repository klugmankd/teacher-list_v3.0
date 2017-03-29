<div id="createFormBlock">
    <div class="title">
        <span>Створити вчителя</span>
    </div>
    <input type="text" id="fullName" class="field" placeholder="П.І.Б.">
    <select class="field" id="institution">
        <option selected>Навчальний заклад</option>
        <?php foreach ($institutions as $institution) { ?>
            <option value="<?=$institution->id_ei?>">
                <?=$institution->name_ei?>
            </option>
        <?php } ?>
    </select>
    <select class="field" id="position">
        <option selected>Посада</option>
        <?php foreach ($positions as $position) { ?>
            <option value="<?=$position->id_position?>">
                <?=$position->position_name?>
            </option>
        <?php } ?>
    </select>
    <select class="field" id="category">
        <option selected>Категорія</option>
        <?php foreach ($categories as $category) { ?>
            <option value="<?=$category->id_category?>">
                <?=$category->category?>
            </option>
        <?php } ?>
    </select>
    <select class="field" id="rank">
        <option selected>Звання</option>
        <?php foreach ($ranks as $rank) { ?>
            <option value="<?=$rank->id_rank?>">
                <?=$rank->teaching_rank?>
            </option>
        <?php } ?>
    </select>
    <textarea id="ppd" class="field" placeholder="ППД"></textarea>
    <button id="create" class="buttons animation">Створити</button>
    <div id="message" style="display: none;"></div>
</div>