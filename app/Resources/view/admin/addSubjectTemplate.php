<div id="addSubjectFormBlock">
    <div class="title">
        <span>Додати предмет вчителю</span>
    </div>
    <select class="field" id="fullName">
        <option selected>П.І.Б.</option>
        <?php foreach ($teachers as $teacher) { ?>
            <option value="<?=$teacher->id_teacher?>">
                <?=$teacher->full_teacher_name?>
            </option>
        <?php } ?>
    </select>
    <select class="field" id="subject">
        <option selected>Предмет</option>
        <?php foreach ($subjects as $subject) { ?>
            <option value="<?=$subject->id_subject?>">
                <?=$subject->subject?>
            </option>
        <?php } ?>
    </select>
    <button id="add" class="buttons animation">Створити</button>
    <div id="message" style="display: none;"></div>
</div>