<?php
  use function q1\core\helper\{
    getSeoTitle,
    getSeoKeywords,
    getSeoDescription,
    getHeaderCustomCode,
    getPageType,
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
      echo getSeoDescription(); 
  ?>">
  <meta name="keywords" content="<?php 
      echo getSeoKeywords(); 
  ?>">
  
  <?php wp_head(); ?>
  


  <?php 
    echo getHeaderCustomCode(); 

    // $options = get_option( \q1\constant\Options::Q1_OPTION_PREFIX );

    // var_dump($options);
  ?>
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