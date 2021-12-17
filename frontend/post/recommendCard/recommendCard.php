<?php 

  $postList = PostService::queryRecommendPostList(get_the_ID());
?>
<div class="recommendCard">
  <div class="recommendCard__title">相关推荐</div>
  <div class="recommendCard__cutOff"></div>
  <div class="recommendCard__postList">
    <?php 
      foreach($postList as $onePost):
    ?>

    <div class="recommendCard__post">
      <i class="fa fa-hand-o-right"></i>
      <a 
        class="recommendCard__postLink"
        href="<?php echo $onePost['url'] ?>"
      ><?php echo $onePost['title'] ?></a>
    </div>

    <?php endforeach; ?>
    
  </div>
</div>