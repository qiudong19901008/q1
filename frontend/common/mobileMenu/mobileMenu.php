
<?php

  $menuList = $args['menuList'];
  
?>

<ul class="mobileMenu">

<?php foreach($menuList as $menu): ?>
  
  <li class="mobileMenu__item">

    <?php if(count($menu['subMenuList']) != 0): ?>

      <span class="mobileMenu__link">
        <?php echo $menu['title'] ?>
        <i class="fa fa-angle-down mobileMenu__icon"></i>
      </span>

    <?php else:?>
    
      <a href="<?php echo $menu['url']; ?>" class="mobileMenu__link">
        <?php echo $menu['title'] ?>
      </a>


      <?php endif;?>
     <!-- 二级菜单开始 -->

     <?php if(count($menu['subMenuList']) != 0): ?>


    <ul class="mobileMenu__submenu">


      <?php foreach($menu['subMenuList'] as $subMenu): ?>

        <li class="mobileMenu__subItem">
          <a href="<?php echo $subMenu['url'] ?>" class="mobileMenu__subLink"><?php echo $subMenu['title'] ?></a>
        </li>

      <?php endforeach; ?>

      
    </ul>

    <?php endif;?>
    <!-- 二级菜单结束-->
  </li>

 

  

  <?php endforeach ?>

</ul>

  