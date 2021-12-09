<?php

  $count = 5;
  $name = '标签云';
  $tags = queryTagsDesc(5);
  var_dump($tags);
  echo(home_url().'/tag/'.'')
?>

<div class="card-tag-container">
  <h3 class="title"><?php echo $name ?></h3>
  <div class="tag-list">
    <!-- <a class="tag">
      <h4 class="name">picgo</h4>
      <span class="count">4</span>
    </a> -->
    <?php 
      foreach($tags as $tag): 
    ?>

      <a class="tag">
        <h4 class="name"><?php echo $tag->name; ?></h4>
        <span class="count"><?php echo $tag->count; ?></span>
      </a>

    <?php endforeach; ?>
  </div>
</div>