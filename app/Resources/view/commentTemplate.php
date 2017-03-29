<div id="commentBlock">
    <div id="commentTitle" class="title">
        <span>Відгуки</span>
    </div>
    <div id="commentsList">
        <?php foreach ($comments as $comment) { ?>
            <div class="comment">
                <div class="sign">"</div>
                <div class="content"><?=$comment->content?></div>
                <div class="author">
                    <div class="photo" style="background: url('web/img/profile/profile.jpg') center; background-size: cover;"></div>
                    <div class="name"><?=$comment->author?></div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>