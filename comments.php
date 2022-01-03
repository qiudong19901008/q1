
<div class="comment-list-container">
  <?php 
    get_template_part('frontend/post/commentSection/commentSection'); 
  ?>
</div>






<?php

  $res = current_user_can( 'edit_posts' );

  var_dump($res);

?>








