
<?php 

  $res = new WP_Query([
    'posts_per_page'	=> 3,
    'meta_key'			=> 'view',
    'orderby'			=> 'meta_value',
    'order'				=> 'DESC',
  ])

  // $posts = get_posts(array(
  //   // 'post_type'			=> 'event',
    
  // ));
?>
<div class="card-hot-article-container">
  <h2 class="title">最热文章</h2>
  <div class="post-list">

      <?php 
        if($res->have_posts()){
          while($res->have_posts()){
            the_post();
            
            ?>

              <div class="post">
                <a class="thumbnail" href="#">
                  <img src="https://siteimage.w2fenx.com/sszas/thumbnail/20211205/sszas-thumbnail-1638664698151.jpeg" alt="">
                </a>
                <div class="info">
                  <div class="meta">
                    <time>the</time>
                    <span>
                      阅读(0)
                    </span>
                  </div>
                  <a href="#"><?php the_title(); ?></a>
                </div>
              </div>

            <?php

          }
        }
       ?>
      


  </div>
</div>