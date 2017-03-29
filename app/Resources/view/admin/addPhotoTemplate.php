<div id="addPhotoFormBlock">
    <div class="title">
        <span>Додати предмет вчителю</span>
    </div>
    <form action="AdminController/uploadAction" method="POST" enctype="multipart/form-data">
        <select name="teacher">
            <option selected>Вчитель</option>
            <?php foreach ($teachers as $teacher) { ?>
                <option value="<?=$teacher->id_teacher?>">
                    <?=$teacher->full_teacher_name?>
                </option>
            <?php } ?>
        </select>
        <label>Фото</label>
        <input type="file" name="img" id="img">
        <input type="submit" id="insertPhoto" value="Додати">
    </form>
</div>