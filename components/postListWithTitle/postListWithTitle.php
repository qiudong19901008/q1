<?php
  use q1\core\constant\Actions;

  $title = $args['title'];

?>



<div class="postListWithTitle">
    <div class="postListWithTitle__title">
      <?php echo $title; ?>
    </div>
    <div class="postListWithTitle__postList">
      <div class="postListWithTitle__postCardWrap">
        <?php 
          get_template_part('q1/component/common/postCard/postCard');
        ?>
      </div>
    </div>
</div>