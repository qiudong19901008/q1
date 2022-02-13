

<?php

use function hedao\lib\helper\console;

get_header()
?>
    
    <div  class="search">
      <div class="search__container container">
        <div class="search__main">

          <div class="search__pageTitleCardWrap">
            <?php get_template_part('components/pageTitleCard/pageTitleCard') ?>
          </div>
          <!-- 文章列表 -->
          <div class="tag__postListWithPaginationWrap">
              <?php 
                get_template_part('components/postListWithPagination/postListWithPagination'); 
              ?>
          </div>

          <?php 
            if(!have_posts()){
              get_template_part('components/noContent/noContent'); 
            }
          ?>

        </div>

        <aside class="search__sidebar">
          <?php  get_sidebar();?>
        </aside>
      </div>
    </div>
    
<?php 
  get_footer();
?>
 