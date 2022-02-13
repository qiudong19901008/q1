
<?php

use q1\core\constant\Fields;

use function hedao\lib\helper\console;
use function hedao\lib\helper\getHeDaoMetaBoxCommonViewCountOption;
use function hedao\lib\helper\getPostCategories;
use function q1\core\helper\getQ1Option;
use function q1\core\helper\getQ1PostThumbUrl;

$categories = getPostCategories();

    
  $likeCount = get_post_meta(get_the_ID(),Fields::Q1_FIELD_POST_LIKE_COUNT,true);
  // console($viewCount);

  // console($post)
  
?>

<div class="postCard">
  <div class="postCard__left">
    <a href="#" class="postCard__thumb">
      <img src="<?php echo getQ1PostThumbUrl($post); ?>" alt="" class="postCard__thumbImg">
    </a>
  </div>
  <div class="postCard__right">
    <div class="postCard__rightHeader">
      <!-- 分类列表 -->
      <div class="postCard__categoryList">

        <?php foreach($categories as $category): ?>

          <a href="<?php echo $category['url'] ?>" class="postCard__category">
            <i class="postCard__categoryDot"></i>
            <?php echo $category['name'] ?>
          </a>

        <?php endforeach; ?>
      </div>
      <!-- 标题 -->
      <h2 class="postCard__title"><a href="<?php the_permalink() ?>" class="postCard__titleLink"><?php the_title() ?></a></h2>
      
    </div>
    <!-- 简介 -->
    <p class="postCard__excerpt">
      <?php the_excerpt(); ?>
    </p>
    <!-- meta -->
    <div class="postCard__meta">
      <!-- 作者, 发布时间 -->
      <div class="postCard__metaLeft">
        <time class="postCard__createTime">
          <i class="fa fa-clock"></i>
          <?php the_time('Y-m-d'); ?>
        </time>
        <span class="postCard__author">
          <i class="fa fa-user"></i> <span><?php the_author() ?></span>
        </span>
      </div>
      <!-- view like comment -->
      <div class="postCard__metaRight">
        <span class="postCard__view">
          <i class="fa fa-eye"></i> <span class="postCard__viewCount"><?php echo getHeDaoMetaBoxCommonViewCountOption(); ?></span>
        </span>
        <span class="postCard__comment">
          <i class="fa fa-comments"></i> <span class="postCard__commentCount">
            <?php 
              global $post;
              echo  $post->comment_count;
            ?>
          </span>
        </span>
        <span href="#" class="postCard__like">
          <i class="fa fa-thumbs-up"></i> <span class="postCard__likeCount"><?php echo $likeCount?$likeCount:0 ?></span>
        </span>
      </div>
    </div>
  </div>
</div>