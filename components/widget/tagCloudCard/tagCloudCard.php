<div class="tagCloudCard">
  <div class="tagCloudCard__title"><?php echo $args['name'] ?></div>
  <div class="tagCloudCard__list">

    <?php foreach($args['tags'] as $tag): ?>

    <a 
      class="tagCloudCard__item"
      href="<?php echo $tag['url']; ?>"
    >
      <h3 class="tagCloudCard__itemName"><?php echo $tag['name']; ?></h3>
      <span class="tagCloudCard__itemCount"><?php echo $tag['count']; ?></span>
    </a>


    <?php endforeach; ?>

  
  </div>
</div>