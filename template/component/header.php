<div class="header-container" id="header-container">
  <div class="top">
    <!-- 菜单切换按钮 -->
    <a href="#" class="toggle-menu-btn">
      <i class="fa fa-bars m-icon-nav"></i>
    </a>
    <!-- logo -->
    <a href="#" class="logo">合道社</a>
    <!-- 菜单 -->
    <div class="nav-menu-container">
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
    <a href="#" class="toggle-search-form-btn">
      <i class="fa fa-search"></i>
      <!-- fa fa-search fa-remove -->
    </a>
  </div>
  <!-- 遮罩 -->
  <div class="mask overlay hide"></div>
  <!-- 搜索框 -->
  <form class="search-form center hide">
    <input type="text" placeholder="输入关键字">
    <button>
      <i class="fa fa-search "></i>
    </button>
  </form>
  <!-- 手机菜单 -->
  <div class="mobile-nav-menu-container">
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

