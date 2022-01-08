
<?php

use function q1\helper\getThemeIntroData;
use q1\constant\Options;

  get_template_part('q1/template/themeIntro/header');

  $themeIntro = getThemeIntroData(get_the_ID());
  $btnList = $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTON_GROUP];
  // var_dump($btnList);
  $abilityList = $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_GROUP];
  // var_dump($themeIntro);
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



<div class="themeIntro" >
    <!-- header -->
    <div class="themeIntro__header" 
      style="background-image:url(<?php echo $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_HEAD_IMAGE] ?>)"
    >
      <div class="themeIntro__headerContainer container">

        <!-- 头部左边 -->
        <div class="themeIntro__headerLeft">
          <h2 class="themeIntro__title">
            <?php echo $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_TITLE] ?>
          </h2>
          <p class="themeIntro__description">
            <?php echo $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_DESCRIPTION] ?>
          </p>
          <p class="themeIntro__version">
            <?php echo $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_THEME_VERSION] ?>
          </p>
          <div class="themeIntro__interaction">

              <?php foreach($btnList as $btn): ?>
                <a class="themeIntro__btn" href="<?php echo $btn[Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_LINK] ?>">
                  <?php echo $btn[Options::Q1_OPTION_PAGE_THEME_INTRO_BUTTION_TEXT] ?>
                </a>
              <?php endforeach; ?>

              <!-- <a class="themeIntro__btn themeIntro__btn--tutorial" href="#">查看文档</a>
              <a class="themeIntro__btn themeIntro__btn--tutorial" href="#">查看文档</a>
              <a class="themeIntro__btn themeIntro__btn--tutorial" href="#">查看文档</a> -->
          </div>
        </div>
        <!-- 头部右边 -->
        <div class="themeIntro__headerRight">
            
        </div>

        
      </div>
      
    </div>

    <!-- body -->
    <div class="themeIntro__ability">
      <div class="themeIntro__abilityContainer container">
        <h3 class="themeIntro__abilityTitle">
          <?php echo $themeIntro[Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_GROUP_TITLE] ?>
        </h3>

        

        <div class="themeIntro__abilityBody">
            
          <?php foreach($abilityList as $key=>$ability): ?>



            <!-- abilityOne begin  -->
            <div class="themeIntro__abilityOne">


            <?php if(!isOddNumber($key+1)): ?>

              <div class="themeIntro__abilityOneImgContainer themeIntro__abilityOneImgContainer--reverse">
            
            <?php else: ?>

              <div class="themeIntro__abilityOneImgContainer">

            <?php endif ?>
            

                <img 
                  class="themeIntro__abilityOneImg"
                  src="<?php echo $ability[Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_IMAGE] ?>" 
                  alt=""
                >
              </div>
              <div class="themeIntro__abilityOneText">
                <h2 class="themeIntro__abilityOneTitle"><?php echo $ability[Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_TITLE] ?></h2>
                <p class="themeIntro__abilityOneDescription">
                  <?php echo $ability[Options::Q1_OPTION_PAGE_THEME_INTRO_ABILITY_DESCRIPTION] ?>
                </p>
              </div>
            </div>
            <!-- abilityOne end  -->

          <?php endforeach; ?>

         
        </div>
      </div>
    </div>
</div>



<?php

  get_template_part('q1/template/themeIntro/footer');

?>