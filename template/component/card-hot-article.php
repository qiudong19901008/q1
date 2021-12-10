
<div class="card-hot-article-container">
  <h2 class="title">最热文章</h2>
  <div class="post-list">
  <?php
    $query = queryPostDesc('comment',4);

    if( $query->have_posts()):
      while($query->have_posts()):
        $query->the_post();
        ?>
        
          <div class="post">
            <a class="thumbnail" href="<?php the_permalink()?>">
              <img src="<?php the_post_thumbnail() ?>" alt="">
            </a>
            <div class="info">
              <div class="meta">
                <time><?php the_time('Y-m-d')?></time>
                <span>
                  浏览(<?php echo getPostViewCount(get_the_ID()) ?>)
                </span>
                <span>
                  评论(<?php echo getPostCommentCount(get_the_ID()) ?>)
                </span>
              </div>
              <a href="<?php the_permalink()?>">
                <?php the_title(); ?>
              </a>
            </div>
          </div>

        <?php
      
      endwhile;
    endif;
  ?>
  
  </div>
</div>