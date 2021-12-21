<div class="siteHeader">
  <div class="siteHeader__top">
    <!-- 菜单切换按钮 -->
    <a href="#" class="siteHeader__toggleMenuBtn">
      <i class="fa fa-bars m-icon-nav"></i>
      
    </a>
    <!-- logo -->
    <a href="<?php echo home_url(); ?>" class="siteHeader__logo">合道社</a>
    <!-- <i class="fa fa-angle-down"></i> -->
    <!-- 菜单 -->
    <?php 
      // get_template_part('frontend/common/menu/menu') 

      // $res = wp_get_nav_menu_items('primary');
      // var_dump($res);
    ?>


    <div class="siteHeader__navMenuContainer">
      <?php
          wp_nav_menu( 
            [
              'theme_location'   =>   'primary',
              'menu_class' =>'menu',
            ] 
          );
      ?>
    </div>
    
    <!-- <ul class="menu">
      <li>
        <a href="#">分类一</a>
      </li>
      <li>
        <a href="#">分类二</a>
      </li>
      <li>
        <a href="#">分类三</a>
      </li>
    </ul> -->
    <!-- 搜索按钮 -->
    <a href="#" class="siteHeader__toggleSearchFormBtn">
      <i class="fa fa-search"></i>
      <!-- fa fa-search fa-remove -->
    </a>
  </div>
  <!-- 遮罩 -->
  <div class="siteHeader__mask overlay hide"></div>
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
  <div class="siteHeader__mobileNavMenuContainer">
    <?php
        wp_nav_menu( 
          [
            'theme_location'   =>   'primary',
            'menu_class' =>'mobile-menu',
          ] 
        );
    ?>
    
  </div>
  
  
  <!-- <ul class="mobile-menu">
    <li>
      <a href="#">分类一</a>
    </li>
    <li>
      <a href="#">分类二</a>
    </li>
    <li>
      <a href="#">分类三</a>
    </li>
  </ul> -->
  
  
</div>

