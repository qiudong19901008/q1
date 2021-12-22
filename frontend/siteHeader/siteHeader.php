<?php
  $menuList = getMenuDataByLocation('primary');
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
        get_template_part('frontend/common/menu/menu',null,[
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
  <div class="siteHeader__mask overlay"></div>
  <!-- 搜索框 -->
  <form class="siteHeader__searchForm center hide">
    <input
      class="siteHeader__searchFormInput"
      type="text" 
      placeholder="输入关键字"
    >
    <button class="siteHeader__searchFormBtn">
      <i class="siteHeader__searchFormBtnIcon fa fa-search"></i>
    </button>
  </form>
  <!-- 手机菜单 -->
  <div class="siteHeader__mobileMenuWrap">
    <?php 
      get_template_part('frontend/common/mobileMenu/mobileMenu',null,[
        'menuList'=>$menuList,
      ]);
    ?>
  </div>
  
 
  
  

  
</div>

