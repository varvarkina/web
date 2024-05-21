<li class="recent__post">
    <img class="recent-post__picture" src="<?=$post['image_url']?>" alt="<?=$post['title']?>">
    <div class="recent-post__text">
        <a class="recent-post__title" title='<?= $post['title'] ?>' href='/post?id=<?= $post['post_id'] ?>'><?=$post['title']?></a>
        <h5 class="recent-post__subtitle"><?=$post['subtitle']?></h5>
    </div>
    <div class="recent-post__line"></div>
    <div class="recent-post__sign">
        <img class="recent__man-photo" src="<?=$post['author_url']?>" alt="author">
        <a class="recent__man-name" href="#"><?=$post['author']?></a>
        <p class="data-number"><?= date("n/j/Y", $post['publish_date']) ?></p>
    </div>
</li>