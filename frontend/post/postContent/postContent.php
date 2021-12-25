
<?php

  global $post;

  $categoryList = CategoryDao::getCategoryListByPostId(get_the_ID());
  $category = $categoryList[0];
  $likeCount = PostDao::getPostLikeCount(get_the_ID());
  $viewCount = PostDao::getPostViewCount(get_the_ID());
  $tagList = TagDao::getTagListByPostId(get_the_ID(),false);
  $commentCount = $post->comment_count;

?>
<div class="postContent">
  <div class="postContent__crumbs">
    <a href="<?php echo home_url(); ?>">首页</a>
    <i class="fa fa-angle-right"></i>
    <a href="<?php echo $category['url'] ?>">
      <?php echo $category['name'] ?>
    </a>
    <i class="fa fa-angle-right"></i>
    <span>正文</span>
  </div>
  <div class="postContent__header">
      <h1 class="postContent__title">
        <a href="<?php echo the_permalink(); ?>"><?php the_title(); ?></a>
    
      </h1>
      <div class="postContent__meta">
        <span>发布日期：<time><?php the_time('Y-m-d h:i:s') ?></time></span>
        <span>分类:<a href="<?php echo $category['url'] ?>"><?php echo $category['name'] ?></a></span>
        <span>阅读(<span><?php echo $viewCount ?></span>)</span>
        <span>评论(<span><?php echo $commentCount; ?></span>)</span>
        <span>点赞(<span class="postContent__likeCount"><?php echo $likeCount; ?></span>)</span>
      </div>
  </div>
  <div class="postContent__content">
    <?php 
      the_content();
    ?>
  </div>
  <p class="postContent__cutOff">
    结束
  </p>
  <div class="postContent__interaction">
    <div 
      class="postContent__like" 
      data-id="<?php the_ID(); ?>"
      data-action="<?php echo Actions::Q1_ACTION_POST_LIKE_POST; ?>"
      data-url="<?php echo admin_url('admin-ajax.php'); ?>"
      data-cookie="<?php echo Cookies::Q1_COOKIE_POST_ALREADY_LIKE; ?>"
    >
      <i class="fa fa-thumbs-up"></i>
      赞(<span class="postContent__likeCount"><?php echo $likeCount; ?></span>)
    </div>
  </div>

  <?php if(count($tagList)!==0): ?>

      <div class="postContent__tagContainer">
        <span>标签:</span>
        <div class="postContent__tagList">
          
        <?php foreach($tagList as $tag): ?>

          <a 
            class="postContent__tag"
            href="<?php echo $tag['url'] ?>">
            <?php echo $tag['name'] ?>
          </a>

        <?php endforeach; ?>
          

        </div>
      </div>

  <?php endif ?>


</div>