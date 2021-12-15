<div class="authorCard">
    <!-- 作者介绍 -->
    <div class="authroCard__intro">
        <div class="authroCard__portrait">
          <img 
            class="authroCard__portraitImg"
            src="<?php echo $args['portrait'] ?>" 
            alt=""
          >
        </div>
        <div class="authorCard__nickname">
          <?php echo $args['nickname'] ?>
        </div>
        <div class="authorCard__description">
          <?php echo $args['discription'] ?>
        </div>
     </div>
     <!-- 创作 -->
     <div class="authorCard__creation">
        <div class="authorCard__article">
          <p class="authorCard__articleName">文章</p>
          <p class="authorCard__articleCount"><?php echo wp_count_posts('post')->publish ?></p>
        </div>
        <div class="authorCard__category">
          <p class="authorCard__categoryName">分类</p>
          <p class="authorCard__categoryCount"><?php echo wp_count_terms('category')-1?></p>
        </div>
        <div class="authorCard__tag">
          <p class="authorCard__tagName">标签</p>
          <p class="authorCard__tagCount"><?php echo wp_count_terms('post-tag')?></p>
        </div>
     </div>
     <!-- 联系方式 -->
     <div class="authorCard__contactWay">
       <?php echo html_entity_decode($args['contactWay']); ?>
        <!-- <a href="#"><i class="fa fa-github"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a>
        <a href="#"><i class="fa fa-envelope"></i></a> -->
     </div>
</div>