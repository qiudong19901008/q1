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
  <title><?php echo getSeoTitle();?></title>
  <meta name="description" content="<?php echo getSeoDescription(getSiteDescription()); ?>">
  <meta name="keywords" content="<?php  echo getSeoKeywords(getSiteKeywords()); ?>">
  
  <?php wp_head(); ?>
  

</head>
<style>
  header{
    background-color: #fff;
  }
  .siteHeaderWrap{
    padding:0 20px;
  }
  body{
    display: flex;
    flex-direction: column;

  }
  /* #app{
    min-width: calc(100vh-);
  } */
</style>
<body>
   
   
   <header>
     <div class="siteHeaderWrap container" data-pagetype="<?php echo getPageType(); ?>" >
      <?php 
          get_template_part( 'components/siteHeader/siteHeader' ); 
        ?>
     </div>
   </header>