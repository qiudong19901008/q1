<?php

  use q1\core\constant\Options;

  $carouselItemList = $args['carouselItemList'];
  $carouselHeight = $args['carouselHeight'];
  $count = count($carouselItemList);


?>


<div class="carousel" style="<?php echo 'height:' . $carouselHeight . 'px'; ?>">
  <div class="carousel__slider" style="width: <?php echo $count*100; ?>%;">


    <?php foreach($carouselItemList as $item): ?>

    <div class="carousel__sliderItem" style="flex-basis:<?php echo 100/$count; ?>%;">
      <!-- 1 -->
      <a href="<?php echo $item[Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_LINK] ?>" class="carousel__sliderItemLink" >
        <img class="carousel__sliderItemImg" src="<?php echo $item[Options::Q1_OPTION_HOME_BASIC_CAROUSEL_ITEM_IMAGE] ?>" alt="">
      </a>
    </div>

    <?php endforeach; ?>

 
  </div>
  <span class="carousel__prev">
      <i class="fa fa-arrow-left carousel__prevIcon"></i>
  </span>
  <span class="carousel__next">
    <i class="fa fa-arrow-right carousel__nextIcon"></i> 
  </span>
  <!-- <div class="carousel__indicatorContainer">
    <span class="carousel__indicator carousel__indicator--active"></span>
    <span class="carousel__indicator"></span>
    <span class="carousel__indicator"></span>
  </div> -->
</div>