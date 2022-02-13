<?php

  use q1\core\constant\Options;
  use function q1\core\helper\{
    getQ1Option,
  };

  $footerMenuList = getQ1Option(Options::Q1_OPTION_GLOBAL_FOOTER_MENU,[]);
  $footerLicenseList = getQ1Option(Options::Q1_OPTION_GLOBAL_FOOTER_LICENSE,[]);
  $footerCopyright = getQ1Option(Options::Q1_OPTION_GLOBAL_FOOTER_COPYRIGHT);
  $friendLinkList = getQ1Option(Options::Q1_OPTION_GLOBAL_FRIEND_LINK,[]);

  $showSiteSpeed = getQ1Option(Options::Q1_OPTION_GLOBAL_FOOTER_SHOW_SITE_SPEED,false);

?>


<div class="siteFooter">
    <!-- 友情链接 -->
    <?php if(count($friendLinkList) != 0): ?>

      <div class="siteFooter__friendLink">
        <div class="siteFooter__friendLinkTitle">
          友情链接:
        </div>
        <ul class="siteFooter__friendLinkList">

          <?php foreach($friendLinkList as $index => $link): ?>

            <?php echo $link['item']; ?>

          <?php endforeach;?>

        </ul>
      </div>

    <?php endif; ?>
    
    <!-- menu -->
    <ul class="siteFooter__menu">


      <?php foreach($footerMenuList as $index => $menu): ?>

          <?php if($index+1 === count($footerMenuList)): ?>
            <?php 
              echo $menu['item'];
              break; 
            ?>
          <?php endif;  ?>
        
          <?php echo $menu['item'] ?>
          <span class="siteFooter__cutOff">|</span>
      <?php endforeach;?>


    </ul>

    <!-- licence -->
    <ul class="siteFooter__licence">


    <?php foreach($footerLicenseList as $index => $license): ?>

      <?php if($index+1 === count($footerLicenseList)): ?>
        <?php 
          echo $license['item'];
          break; 
        ?>
      <?php endif;  ?>

      <?php echo $license['item']; ?>
      <span class="siteFooter__cutOff">|</span>

      <!-- <a href="#">公安备案</a>
      <span class="siteFooter__cutOff">|</span>
      <a href="#">网信部备案</a> -->


    <?php endforeach;?>
      

    </ul>
    


    <!-- copyright -->
    <div class="copyright">

      

      <a href='https://hedaoshe.com' style='margin-right:10px;'>合道社</a>
      <?php echo $footerCopyright;  ?>
      
      <!-- ©2021 <a href="#">srcmini</a> -->
    </div>
    
    <?php if($showSiteSpeed): ?>

    <p style="text-align:right;position:absolute;bottom:30px;right:5px;font-size:6px;">
        <?php printf('%d 次查询, 耗时 %s 秒', get_num_queries(), timer_stop(0, 3)); ?>
    </p>

    <?php endif; ?>

    <!-- <p style='text-align:right;position:absolute;bottom:10px;right:5px;font-size:6px;'>
        powerd by 
    </p> -->
   
    
    
</div>