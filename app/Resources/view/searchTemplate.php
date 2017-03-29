<div id="searchBlock">
    <div id="searchBlockContent">
        <div id="searchTitle" class="title">
            <span>Пошук</span>
        </div>
        <div id="searchParameterBlock">
            <input type="text" class="field animation" id="searchField" name="fullName" placeholder="Кого шукаємо?" autocomplete="off">
            <select class="select_style category animation" name="subject" id="subject">
                <option selected value="">Предмет</option>
                <?php foreach ($subjects as $subject) { ?>
                <option value="<?=$subject->id_subject?>">
                    <?=$subject->subject?>
                </option>
                <?php } ?>
            </select><br>
            <select class="select_style category animation" name="institution" id="">
                <option selected value="">Навчальний заклад</option>
                <?php foreach ($institutions as $institution) { ?>
                <option value="<?=$institution->id_ei?>">
                    <?=$institution->name_ei?>
                </option>
                <?php } ?>
            </select><br>
            <select class="select_style category animation" name="rank" id="">
                <option selected value="">Звання</option>
                <?php foreach ($ranks as $rank) { ?>
                <option value="<?=$rank->id_rank?>">
                    <?=$rank->teaching_rank?>
                </option>
                <?php } ?>
            </select>
        </div>
        <div id="teacherProfileBlock">
        </div>
        <div id="searchResultTitle" class="title">
            <span>Результати</span>
        </div>
        <div id="searchResultBlock"></div>
    </div>
</div>
