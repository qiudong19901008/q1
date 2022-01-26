<?php
/*
Template Name: 主题介绍
*/
    use function q1\core\helper\{
      getThemeIntroData,
      getFooterCustomCode,
    };
    use q1\core\constant\Options;

    $themeIntro = getThemeIntroData(get_the_ID());


?>



<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  
  <title><?php echo $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_SEO_TITLE] ?></title>
  <meta name="description" content="<?php echo $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_SEO_DESCRIPTION] ?>">
  <meta name="keywords" content="<?php echo $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_SEO_KEYWORDS] ?>">
  
  <?php wp_head(); ?>
  <link href="https://cdn.bootcdn.net/ajax/libs/font-awesome/5.15.3/css/all.min.css" rel="stylesheet">

</head>
<body>

<?php 
    get_template_part('template-parts/components/page/themeIntro/themeIntro',null,[
      'themeIntro'=>$themeIntro,
    ]); 
?>

<?php
  
?>
 


  <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.js"></script>
  
  <?php wp_footer();?>
  <?php echo getFooterCustomCode(); ?>
  </body>
</html>