<div id="aboutTeacherList">
    <div class="title">
        <span>Редагувати дані</span>
    </div>
    <div id="aboutTeacherListHeader">
        <div class="record">
            <div class="label">
                <img src="web/img/icon/fullName.svg" alt="">
            </div>
            <div class="teacherProperty">
                <input type="text" id="fullName" class="editField" value="<?=$teacher->full_teacher_name?>">
            </div>
        </div>
        <div class="record">
            <div class="label">
                <img src="web/img/icon/position.svg" alt="">
            </div>
            <div class="teacherProperty">
                <select id="position" class="editField">
                    <?php foreach ($positions as $position) { ?>
                        <?php if ($teacher->position_id == $position->id_position) { ?>
                            <option value="<?=$position->id_position?>" selected>
                                <?=$position->position_name?>
                            </option>
                        <?php }?>
                        <option value="<?=$position->id_position?>">
                            <?=$position->position_name?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
        <div class="record">
            <div class="label">
                <img src="web/img/icon/rank.svg" alt="">
            </div>
            <div class="teacherProperty">
                <select id="rank" class="editField">
                    <?php foreach ($ranks as $rank) { ?>
                        <?php if ($teacher->rank_id == $rank->id_rank) { ?>
                            <option value="<?=$rank->id_rank?>" selected>
                                <?=$rank->teaching_rank?>
                            </option>
                        <?php }?>
                        <option value="<?=$rank->id_rank?>">
                            <?=$rank->teaching_rank?>
                        </option>
                    <?php } ?>
                </select>
            </div>
        </div>
    </div>
    <div class="record">
        <div class="label">
            <img src="web/img/icon/category.svg" alt="">
        </div>
        <div class="teacherProperty">
            <select id="category" class="editField">
                <?php foreach ($categories as $category) { ?>
                    <?php if ($teacher->category_id == $category->id_category) { ?>
                        <option value="<?=$category->id_category?>" selected>
                            <?=$category->category?>
                        </option>
                    <?php }?>
                    <option value="<?=$category->id_category?>">
                        <?=$category->category?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="record">
        <div class="label">
            <img src="web/img/icon/institution.svg" alt="">
        </div>
        <div class="teacherProperty">
            <select id="institution" class="editField">
                <?php foreach ($institutions as $institution) { ?>
                    <?php if ($teacher->ei_id == $institution->id_ei) { ?>
                        <option value="<?=$institution->id_ei?>" selected>
                            <?=$institution->name_ei?>
                        </option>
                    <?php }?>
                    <option value="<?=$institution->id_ei?>">
                        <?=$institution->name_ei?>
                    </option>
                <?php } ?>
            </select>
        </div>
    </div>
    <div class="record">
        <div class="label">
            <img src="web/img/icon/ppd.svg" alt="">
        </div>
        <div class="teacherProperty">
            <textarea id="ppd" class="editField"><?=$teacher->PDD?></textarea>
        </div>
    </div>
    <button id="update" class="buttons">Оновити</button>
    <button id="delete" class="buttons">Видалити</button>
    <div id="message" style="display: none;"></div>
</div>