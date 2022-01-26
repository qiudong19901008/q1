<?php

  use hedao\dao\{
    CategoryDao,
    TagDao,
  };

  use q1\core\constant\{
    Options,
    Actions,
    Cookies,
  };

  use function q1\core\helper\{
    getQ1Option,
    getSeoTitle,
    getPostViewCount,
    getPostLikeCount,
  };


global $post;

  $categoryList = CategoryDao::getCategoryListByPostId(get_the_ID());
  $category = $categoryList[0];
  $likeCount = getPostLikeCount(get_the_ID());
  $viewCount = getPostViewCount(get_the_ID());
  $tagList = TagDao::getTagListByPostId(get_the_ID(),false);
  $commentCount = $post->comment_count;


  $openPostBelongToAnnoncement = (bool)getQ1Option(Options::Q1_OPTION_POST_BASIC_OPEN_POST_BELONG_TO_ANNONCEMENT);


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
        <span>发布日期：<time><?php the_time('Y-m-d H:i:s') ?></time></span>
        <span>分类:<a href="<?php echo $category['url'] ?>"><?php echo $category['name'] ?></a></span>
        <span>阅读(<span><?php echo $viewCount ?></span>)</span>
        <span>评论(<span><?php echo $commentCount; ?></span>)</span>
        <span>点赞(<span class="postContent__likeCount"><?php echo $likeCount; ?></span>)</span>
        <?php edit_post_link(__('[编辑]')); ?>
        
      </div>
  </div>
  <div class="postContent__content" id="github">
    <?php 
      the_content();
    ?>

    <!-- 开启首发声明 -->

    <?php if($openPostBelongToAnnoncement): ?>

      <blockquote
        style="font-size:16px;color:#000;"
      > 
        本文首发于:
        <a 
          href="<?php the_permalink(); ?>"
          style="color:#000;text-decoration:none;cursor:default;"
        ><?php echo getSeoTitle();  ?></a>
      </blockquote >

    <?php endif; ?>



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