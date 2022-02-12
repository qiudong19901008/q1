<?php 
      
      get_header();

      use function q1\core\helper\getQ1Option;
      use q1\core\constant\Options;
      
      $carouselItemList = getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL,[]);
      $count = count($carouselItemList);

      $carouselHeight= getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL_HEIGHT,300);
      $interval= getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL_INTERVAL,4);


?>

    
    <section class="main">

      <div class="indexPage">
        <!-- 首页内容 -->
        <div class="indexPage__contentWrap">

          <div class="indexPageContent">

            <!-- 文章列表 -->
            <div class="indexPageContent__postList">
              <div class="indexPageContent__postListTitle">
                最新文章
              </div>
              <div class="indexPageContent__postListWrap">
                <?php 
                  get_template_part('template-parts/components/common/postList/postList'); 
                ?>
              </div>
              
            </div>
            <!-- 分页 -->
            <div class="indexPageContent__paginationWrap">
              <?php 
                get_template_part('template-parts/components/common/pagination/pagination'); 
              ?>
            </div>

            
            
          </div>
        </div>
        <!-- 侧边栏 -->
        <div class="indexPage__sidebar">
          <?php 
            get_sidebar();
          ?>
        </div>
      </div>

    </section>

    
    <?php 
      get_footer();
    ?>
 