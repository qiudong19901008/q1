<?php

use q1\core\constant\Options;

use function q1\core\helper\getQ1Option;

$isOpen = getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL_OPEN);

get_header();
?>

    <div  class="index">
      <div class="index__container container">
        <div class="index__main">
          <!-- 轮播图 -->

          <?php if($isOpen): ?>

          <div class="index__carouselWrap"
            data-carouselinterval="<?php echo getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL_INTERVAL,3) ?>"
            data-carouselcount="<?php echo count(getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL,[])) ?>"
          >
            <?php 
              get_template_part('components/carousel/carousel'); 
            ?>
          </div>
          
          <?php endif; ?>

          <!-- 文章列表 -->
          <div class="index__postList">
            <div class="index__postListTitle">
              最新文章
            </div>
            <div class="index__postListWithPaginationWrap">
              <?php 
                get_template_part('components/postListWithPagination/postListWithPagination'); 
              ?>
            </div>
          </div>
        </div>

        <aside class="index__sidebar">
          <?php  get_sidebar();?>
        </aside>
      </div>
    </div>




<?php 
  get_footer();
?>
