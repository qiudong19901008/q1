<?php 
      
      // get_template_part('q1/header')  
  use hedao\dao\CategoryDao;
  use function hedao\lib\helper\{
     getUidFromToken
  };

// $res = CategoryDao::queryCategoryList(1,10);

$res = getUidFromToken('sjdkfdksf','sjd');

var_dump($res);

?>
    
    <div class="indexPageWrap">

      <div class="indexPage">
        <!-- 首页内容 -->
        <div class="indexPage__contentWrap">
          <?php 
            // get_template_part('q1/component/indexPageContent/indexPageContent') 
          ?>
        </div>
        <!-- 侧边栏 -->
        <div class="indexPage__sidebar">
          <?php 
            // get_template_part('q1/sidebar'); 
          ?>
        </div>
      </div>

    </div>

    
    <?php 
      // get_template_part('q1/footer');
    ?>
 