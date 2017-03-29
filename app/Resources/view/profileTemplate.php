<div id="profileTitle" class="title">
    <span>Профіль</span>
</div>
<div id="aboutTeacherList">
    <div id="aboutTeacherListHeader">
        <div id="aboutTeacherListHeaderLeft">
            <div class="record">
                <div class="label">
                    <img src="web/img/icon/fullName.svg" alt="">
                </div>
                <div class="teacherProperty"><?=$teacher->full_teacher_name?></div>
            </div>
            <div class="record">
                <div class="label">
                    <img src="web/img/icon/position.svg" alt="">
                </div>
                <div class="teacherProperty firstProperty"><?=$teacher->position_name?></div>
            </div>
            <div class="record">
                <div class="label">
                    <img src="web/img/icon/rank.svg" alt="">
                </div>
                <div class="teacherProperty firstProperty"><?=$teacher->teaching_rank?></div>
            </div>
        </div>
        <div id="aboutTeacherListHeaderRight">
            <div class="photo" style="background: url('web/img/profile/<?=$teacher->img?>') center; background-size: cover;">
            </div>
        </div>
    </div>
    <div class="record">
        <div class="label">
            <img src="web/img/icon/category.svg" alt="">
        </div>
        <div class="teacherProperty secondProperty"><?=$teacher->category?></div>
    </div>
    <div class="record">
        <div class="label">
            <img src="web/img/icon/institution.svg" alt="">
        </div>
        <div class="teacherProperty secondProperty"><?=$teacher->educatioal_institution?></div>
    </div>
    <?php if($subjects != "") { ?>
    <div class="record">
        <div class="label">
            <img src="web/img/icon/subjects.svg" alt="">
        </div>
        <div class="teacherProperty secondProperty"><?=$subjects?></div>
    </div>
    <?php } ?>
    <div class="record">
        <div class="label">
            <img src="web/img/icon/ppd.svg" alt="">
        </div>
        <div class="teacherProperty secondProperty"><?=$teacher->PDD?></div>
    </div>
</div>