
<?php
  $myPost = $args['post'];
  // var_dump($myPost);
?>


<div class="simplePostCard">
  <a class="simplePostCard__thumbnail" href="<?php echo $myPost['url']; ?>">
    <img
      class="simplePostCard__thumbnailImg"
      src="<?php echo $myPost['thumbnail']; ?>" 
      alt=""
    >
  </a>
  <div class="simplePostCard__info">
    <div class="simplePostCard__meta">
      <time class="simplePostCard__time"><?php echo $myPost['create_date']; ?></time>
      <?php echo $myPost['metaHtml']; ?>
    </div>
    <a 
      class="simplePostCard__title"
      href="<?php echo $myPost['url']; ?>"
    >
      <?php echo $myPost['title']; ?>
    </a>
  </div>
</div>