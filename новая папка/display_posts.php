<div class = "inner">
    <h1 class = "title">
        <?= $post['title']?> <?= $post['post_id']?>
    </h1>
    <h2 class = "subtitle">
        <?= $post['subtitle']?>
    </h2>
</div>
<img class = "img1" src = "<?= $post['image_url']?>" alt = "<?= $post['title']?>">
<div class = "text">
    <div class = "text__inner">
        <?= $post['content']?>
    </div>
</div>