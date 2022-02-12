<?php 
  use function q1\core\helper\getQ1Option;
  use q1\core\constant\Options;
  
  $carouselItemList = getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL,[]);
  $count = count($carouselItemList);

  $carouselHeight= getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL_HEIGHT,300);
  $interval= getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL_INTERVAL,4);
  

?>

<div class="indexPageContent">

  <?php if($count !== 0): ?>

  <!-- 轮播图 -->
    <div class="indexPageContent__carouselWrap" 
      data-carouselcount="<?php echo $count; ?>"
      data-carouselinterval="<?php echo $interval; ?>"
    >
      <?php 
        get_template_part('template-parts/components/index/carousel/carousel',null,[
        'carouselItemList'=>$carouselItemList,
        'carouselHeight' => $carouselHeight,
        ]); 
      ?>
    </div>

  <?php endif; ?>


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