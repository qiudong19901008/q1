<?php

  $menuList = $args['menuList'];

?>


<ul class="mobileMenu">
  
  <?php foreach($menuList as $menu): ?>

    <li class="mobileMenu__item">
      
      <a href="<?php echo $menu['url']; ?>" class="mobileMenu__itemLink">
        <?php echo $menu['title'] ?>
      </a>

      <?php if(count($menu['subMenuList']) != 0): ?>

        <i class="fa fa-angle-down mobileMenu__itemIcon"></i>
      
        
        <!-- 二级菜单开始 -->
        <ul class="mobileMenu__submenu">

            <?php foreach($menu['subMenuList'] as $subMenu): ?>

              <li class="mobileMenu__submenuItem">
                <a href="<?php echo $subMenu['url'] ?>" class="mobileMenu__submenuItemLink"><?php echo $subMenu['title'] ?></a>
              </li>
              
            <?php endforeach; ?>

        </ul>
      <!-- 二级菜单结束-->


      <?php endif;?>
      
    </li>

 


  <?php endforeach ?>

</ul>

  