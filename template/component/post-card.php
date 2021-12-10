<?php 
  global $post;
?>
<div class="post-card-container">
  <div class="header">
    <?php getPostCategory($post->ID) ?>
    <!-- <a href="#" class="category">
      分类
      <i></i>
    </a> -->
    <h2>
      <a href="<?php the_permalink(); ?>" title="">
        <?php the_title(); ?>
      </a>
    </h2>
  </div>
  <div class="meta">
    <time>
      <i class="fa fa-clock-o"></i>
      <?php the_date('Y-m-d') ?>
    </time>
    <span class="author">
      <i class="fa fa-user"></i>
      <span href="#"><?php the_author(); ?></span>
    </span>
    <span>
      <i class="fa fa-eye"></i>
      阅读(<?php echo getPostViewCount($post->ID) ?>)
    </span>
    <a href="" class="comment">
      <i class="fa fa-comments-o"></i>
      评论(<?php echo getPostCommentCount($post->ID) ?>)
    </a>
    <a href="#" class="post-like">
      <i class="fa fa-thumbs-o-up"></i>
      赞(<span>0</span>)
    </a>
  </div>
  
  <div class="excerpt">
    <?php the_excerpt(); ?>
  </div>
</div>