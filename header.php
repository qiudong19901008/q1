<?php

use function hedao\lib\helper\{
  getSeoDescription,
  getSeoKeywords,
  getSeoTitle,
};
use function q1\core\helper\{
    getPageType,
    getSiteDescription,
    getSiteKeywords,
};


 
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title
    id="title"
  ><?php 
    echo getSeoTitle();
  ?></title>
  <meta name="description" content="<?php 
      echo getSeoDescription(getSiteDescription()); 
  ?>">
  <meta name="keywords" content="<?php 
      echo getSeoKeywords(getSiteKeywords()); 
  ?>">
  
  <?php wp_head(); ?>
  

</head>
<body>
   <!-- 页头 -->

  <?php if(!is_page()): ?>

  <div class="siteHeaderWrapWrap" data-pagetype="<?php 
    echo getPageType(); 
  ?>">
    <div class="siteHeaderWrap">
      <?php 
        get_template_part( 'template-parts/components/common/siteHeader/siteHeader' ); 
      ?>
    </div>
  </div>

  <?php endif; ?>