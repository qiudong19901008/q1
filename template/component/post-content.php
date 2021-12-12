
<?php 
  $categorysInfo = CategoryDao::getCategoryListByPostId(get_the_ID());
  $categoryInfo = $categorysInfo[0];

  $tags = TagDao::getTagListByPostId(get_the_ID());
?>
<div class="post-content-container">
  <div class="crumbs">
    <a href="<?php echo home_url(); ?>">首页</a>
    <i class="fa fa-angle-right"></i>
    <a href="<?php echo $categoryInfo['url'] ?>"><?php echo $categoryInfo['name'] ?></a>
    <i class="fa fa-angle-right"></i>
    <span>正文</span>
  </div>
  <div class="header">
      <h1 class="title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h1>
      <div class="meta">
        <span>发布日期：<time><?php the_time('Y-m-d h:i:s') ?></time></span>
        <span>分类:<a href="<?php echo $categoryInfo['url'] ?>"><?php echo $categoryInfo['name'] ?></a></span>
        <span>阅读(<span><?php echo getPostViewCount(get_the_ID()) ?></span>)</span>
        <span>评论(<span><?php echo getPostCommentCount(get_the_ID()) ?></span>)</span>
        <span>点赞(<span id="likeShow"><?php echo getPostLikeCount(get_the_ID()) ?></span>)</span>
      </div>
  </div>
  <div class="post-content">
    <?php the_content(); ?>
  </div>
  <p class="cut-off">
    结束
  </p>
  <div class="interaction">
    <div class="like <?php echo has_cookie('q1_post_like_'.get_the_ID())?'done':'';  ?>" id="like" data-id="<?php the_ID(); ?>">
      <i class="fa fa-thumbs-up"></i>
      赞(<span><?php echo getPostLikeCount(get_the_ID()) ?></span>)
    </div>
  </div>
  <div class="post-tag">
    <span>标签:</span>
    <div class="tag-list">
      
      <?php 
        if(count($tags) === 0){
          echo '<span class="tag">无</span>';
        }else{
          foreach($tags as $tag){
      ?>
      
        <a href="<?php echo $tag['url'] ?>"><?php echo $tag['name'] ?></a>
        
      <?php
          }
        }
      ?>

     

    </div>
  </div>
</div>