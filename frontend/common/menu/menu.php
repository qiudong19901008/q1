
<?php

  $menuList = $args['menuList'];
  


?>


<ul class="menu">

  <?php foreach($menuList as $menu): ?>

    <li class="menu__item">
      <a href="<?php echo $menu['url']; ?>" class="menu__link">
        <?php echo $menu['title'] ?>

        <?php if(count($menu['subMenuList']) != 0): ?>
          <i class="fa fa-angle-down menu__icon"></i>
        <?php endif;?>

      </a>


      <!-- 二级菜单开始 -->
      <?php if(count($menu['subMenuList']) != 0): ?>

    
        <ul class="menu__submenu">

          <?php foreach($menu['subMenuList'] as $subMenu): ?>

            <li class="menu__submenuItem">
              <a href="<?php echo $subMenu['url'] ?>" class="menu__submenuLink"><?php echo $subMenu['title'] ?></a>
            </li>
        
          <?php endforeach; ?>

        </ul>

      <?php endif;?>
      <!-- 二级菜单结束-->

    </li>

  <?php endforeach ?>

</ul>

  