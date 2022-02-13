<?php
  use q1\core\constant\Actions;
?>

<div class="postList">

  <?php 
    if(have_posts()):
      while(have_posts()):
        the_post();
  ?>

  <div class="postList__CardWrap">
    <?php 
      get_template_part('components/postCard/postCard');
    ?>
  </div>

  <?php  
      endwhile;
    endif;
  ?>


</div>