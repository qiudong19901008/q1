<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="<?php bloginfo('description'); ?>">
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">
  <title><?php bloginfo('name'); ?></title>
  <?php wp_head(); ?>
</head>
<body>
   <!-- 页头 -->
  <div class="header-wrapper">
    <div class="header">
      <?php get_template_part( 'template/component/header' ); ?>
    </div>
  </div>