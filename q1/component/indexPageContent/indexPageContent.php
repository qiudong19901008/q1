<?php 
  use function q1\helper\getQ1Option;
  use q1\constant\Options;
  
  $carouselItemList = getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL,[]);
  $count = count($carouselItemList);

  $carouselHeight= getQ1Option(Options::Q1_OPTION_HOME_BASIC_CAROUSEL_HEIGHT);
  if($carouselHeight != 'auto' && !is_numeric($carouselHeight)){
    $carouselHeight = 'auto';
  }

?>

<div class="indexPageContent">

  <?php if($count !== 0): ?>

  <!-- 轮播图 -->
  <div class="indexPageContent__carouselWrap" 
    data-carouselcount="<?php echo $count; ?>"
  >
    <?php 
      get_template_part('q1/component/common/carousel/carousel',null,[
      'carouselItemList'=>$carouselItemList,
      'carouselHeight' => $carouselHeight,
      ]); 
    ?>
  </div>

  <?php endif; ?>


  <!-- 置顶文章 -->
  <!-- <div class="indexPageContent__topPost">
    <div class="indexPageContent__topPostTitle">
      置顶
    </div>
    <div class="indexPageContent__topPostWrap"> -->
      <?php 
        // get_template_part('q1/component/common/postCard/postCard') 
      ?>
    <!-- </div>
  </div> -->
  <!-- 文章列表 -->
  <div class="indexPageContent__postList">
    <div class="indexPageContent__postListTitle">
      最新文章
    </div>
    <div class="indexPageContent__postListWrap">
      <?php 
        get_template_part('q1/component/common/postList/postList'); 
      ?>
    </div>
    
  </div>
  <!-- 分页 -->
  <div class="indexPageContent__paginationWrap">
    <?php 
      get_template_part('q1/component/common/pagination/pagination'); 
    ?>
  </div>
  
  
</div>