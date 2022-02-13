<?php

  use function hedao\lib\helper\{
    getMenuDataByLocation
  };

  $menuList = getMenuDataByLocation('primary');
  // var_dump($menuList);
  // die;
?>

<div class="siteHeader">
  <div class="siteHeader__top">
    <!-- 菜单切换按钮 -->
    <a href="#" class="siteHeader__toggleMenuBtn">
      <i class="fa fa-bars m-icon-nav"></i>
    </a>
    <!-- logo -->
    <a href="<?php echo home_url(); ?>" class="siteHeader__logo"><?php echo get_option('blogname'); ?></a>
    <!-- 电脑菜单 -->
    <div class="siteHeader__menuWrap">
      <?php 
        get_template_part('components/menu/menu',null,[
          'menuList'=>$menuList,
        ]);
      ?>
    </div>

    <!-- 搜索按钮 -->
    <a href="#" class="siteHeader__toggleSearchFormBtn">
      <i class="fa fa-search"></i>
      <!-- fa fa-search fa-remove -->
    </a>
  </div>
  <!-- 遮罩 -->
  <div class="siteHeader__mask overlay hide"></div>
  <!-- 搜索框 -->
  <form class="siteHeader__searchForm center hide" action="<?php echo home_url();?>" method="get">
    <input
      class="siteHeader__searchFormInput"
      autocomplete="off"
      type="text" 
      placeholder="搜点什么?"
      name="s"
    >
    <button class="siteHeader__searchFormBtn">
      <i class="siteHeader__searchFormBtnIcon fa fa-search"></i>
    </button>
  </form>
  <!-- 手机菜单 -->
  <div class="siteHeader__mobileMenuWrap">
    <?php 
      get_template_part('components/mobileMenu/mobileMenu',null,[
        'menuList'=>$menuList,
      ]);
    ?>
  </div>
  
 
  
  

  
</div>

