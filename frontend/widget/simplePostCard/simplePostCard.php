
<?php
  $post = $args['post'];
  // var_dump($post);
?>


<div class="simplePostCard">
  <a class="simplePostCard__thumbnail" href="#">
    <img
      class="simplePostCard__thumbnailImg"
      src="<?php echo $post['thumbnail']; ?>" 
      alt=""
    >
  </a>
  <div class="simplePostCard__info">
    <div class="simplePostCard__meta">
      <time class="simplePostCard__time"><?php echo $post['create_time']; ?></time>
      <?php echo $post['metaHtml']; ?>
    </div>
    <a 
      class="simplePostCard__title"
      href="<?php echo $post['url']; ?>"
    >
      <?php echo $post['title']; ?>
    </a>
  </div>
</div>