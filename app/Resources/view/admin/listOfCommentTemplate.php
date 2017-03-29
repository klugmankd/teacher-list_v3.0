<ul id="listOfComments">
    <div class="title">
        <span>Список відгуків</span>
    </div>
    <?php foreach ($comments as $comment) { ?>
    <li class="commentItem" id="comment_<?=$comment->id?>">
        <div class="author"><?=$comment->author?></div>
        <div class="content"><?=$comment->content?></div>
        <div id="approveBlock<?=$comment->id?>" class="approveMenu">
            <div id="approve_<?=$comment->id?>" class="approve">Yes</div>
            <div id="disapprove_<?=$comment->id?>" class="disapprove">No</div>
        </div>
        <div id="message_<?=$comment->id?>" style="display: none;"></div>
    </li>
    <?php } ?>
</ul>