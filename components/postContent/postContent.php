<?php

  use hedao\dao\{
    CategoryDao,
    TagDao,
  };

  use q1\lib\constant\{
    Options,
    Actions,
    Cookies,
  };

use function hedao\lib\helper\getSeoTitle;
use function hedao\lib\helper\getSiteUrl;
use function q1\lib\helper\{
    getQ1Option,
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


  $openPostStatement = (bool)getQ1Option(Options::Q1_OPTION_POST_BASIC_OPEN_POST_STATEMENT);


  $postStatementContent = getQ1Option(Options::Q1_OPTION_POST_BASIC_POST_STATEMENT_CONTENT);

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

  <p class="postContent__cutOff">
    结束
  </p>

    

  <!-- https://hedaoshe.com/wp-json -->
  <!-- /q1/v1/token/get -->

  </div>
  
  <?php 
    ;
  ?>

  <div class="postContent__interaction">
    <div 
      class="postContent__like" 
      data-id="<?php the_ID(); ?>"
      data-url="<?php echo getSiteUrl() . '/wp-json/q1/v1/post/like' ?>"
      data-cookie="<?php echo Cookies::Q1_COOKIE_POST_ALREADY_LIKE; ?>"
    >
      <i class="fa fa-thumbs-up"></i>
      赞(<span class="postContent__likeCount"><?php echo $likeCount; ?></span>)
    </div>
  </div>

  <!-- 开启首发声明 -->

  <?php if($openPostStatement): ?>
  
  <div class="postStatementWrap">

    <?php get_template_part('template-parts/components/post/postStatement/postStatement',null,[
      'title'=>getSeoTitle(),
      'postStatementContent'=>$postStatementContent,
    ]);  ?>

  </div>
    

<?php endif; ?>

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