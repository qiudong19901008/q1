
<?php 
  $categorysInfo = CategoryDao::getCategoryListByPostId(get_the_ID());
  $categoryInfo = $categorysInfo[0];

  $tags = TagDao::getTagListByPostId(get_the_ID());
?>
<div class="postContent">
  <div class="postContent__crumbs">
    <a href="<?php echo home_url(); ?>">首页</a>
    <i class="fa fa-angle-right"></i>
    <a href="<?php echo $categoryInfo['url'] ?>"><?php echo $categoryInfo['name'] ?></a>
    <i class="fa fa-angle-right"></i>
    <span>正文</span>
  </div>
  <div class="postContent__header">
      <h1 class="postContent__title">
        <a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
      </h1>
      <div class="postContent__meta">
        <span>发布日期：<time><?php the_time('Y-m-d h:i:s') ?></time></span>
        <span>分类:<a href="<?php echo $categoryInfo['url'] ?>"><?php echo $categoryInfo['name'] ?></a></span>
        <span>阅读(<span><?php echo PostDao::getPostViewCount(get_the_ID()) ?></span>)</span>
        <span>评论(<span><?php echo PostDao::getPostCommentCount(get_the_ID()) ?></span>)</span>
        <span>点赞(<span id="likeShow"><?php echo PostDao::getPostLikeCount(get_the_ID()) ?></span>)</span>
      </div>
  </div>
  <div class="post-content">
    <?php the_content(); ?>
  </div>
  <p class="postContent__cutOff">
    结束
  </p>
  <div class="postContent__interaction">
    <div 
      class="postContent__like postContent__like--done" 
      id="like" 
      data-id="<?php the_ID(); ?>"
    >
      <i class="fa fa-thumbs-up"></i>
      赞(<span><?php echo PostDao::getPostLikeCount(get_the_ID()); ?></span>)
    </div>
  </div>
  <div class="postContent__tagContainer">
    <span>标签:</span>
    <div class="postContent__tagList">
      
      <?php 
        if(count($tags) === 0){
          echo '<span class="tag">无</span>';
        }else{
          foreach($tags as $tag){
      ?>
      
        <a 
          class="postContent__tag"
          href="<?php echo $tag['url'] ?>">
          <?php echo $tag['name'] ?>
        </a>
        
      <?php
          }
        }
      ?>

     

    </div>
  </div>
</div>