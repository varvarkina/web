<li class="featured-pics__element">
    <div class="featured__posts">    
        <img class="featured__pic" src="<?=$post['image_url']?>" alt="<?=$post['title']?>">
    </div>
    <div class="featured-posts__inner">
        <a class="featured-posts__title" href="#"><?= $post['title'] ?></a>
        <h2 class="featured-posts__subtitle"><a class="featured-posts-subtitle__href" title='<?= $post['title'] ?>' href='/post?id=<?= $post['post_id'] ?>'><?= $post['subtitle'] ?></a></h2>
    </div>
    <div class="featured-posts__sign">
        <img class="featured-posts__man-photo" src="<?=$post['author_url']?>" alt="author">
        <a class="featured-posts__man-name" href="#"><?= $post['author'] ?></a>
        <p class="featured-posts__data"><?= date("F d, Y", $post['publish_date']) ?></p>
    </div>          
</li>

