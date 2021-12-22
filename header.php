<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title><?php echo getSeoTitle() ?></title>
  <meta name="description" content="<?php echo getSeoDescription(); ?>">
  <meta name="keywords" content="<?php echo getSeoKeywords(); ?>">
  
  <?php wp_head(); ?>
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
</head>
<body>
   <!-- 页头 -->
  <div class="siteHeaderWrapWrap">
    <div class="siteHeaderWrap">
      <?php get_template_part( 'frontend/siteHeader/siteHeader' ); ?>
    </div>
  </div>