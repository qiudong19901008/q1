<?php

  $footerMenuList = getQ1Option(Options::Q1_FOOTER_MENU_OPTION_NAME,'array');
  $footerLicenseList = getQ1Option(Options::Q1_FOOTER_LICENSE_OPTION_NAME,'array');
  $footerCopyright = getQ1Option(Options::Q1_FOOTER_COPYRIGHT_OPTION_NAME);
  $friendLinkList = getQ1Option(Options::Q1_FRIEND_LINK_OPTION_NAME,'array');

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

            <?php echo $link; ?>

          <?php endforeach;?>

        </ul>
      </div>

    <?php endif; ?>
    
    <!-- menu -->
    <ul class="siteFooter__menu">


      <?php foreach($footerMenuList as $index => $menu): ?>

          <?php if($index+1 === count($footerMenuList)): ?>
            <?php 
              echo $menu;
              break; 
            ?>
          <?php endif;  ?>
        
          <?php echo $menu; ?>
          <span class="siteFooter__cutOff">|</span>
        <!-- <a href="#">关于我们</a>
        <span class="siteFooter__cutOff">|</span>
        <a href="#">联系我们</a>
        <span class="siteFooter__cutOff">|</span>
        <a href="#">隐私策略</a>
        <span class="siteFooter__cutOff">|</span>
        <a href="#">网站地图</a> -->

      <?php endforeach;?>


    </ul>

    <!-- licence -->
    <ul class="siteFooter__licence">


    <?php foreach($footerLicenseList as $index => $license): ?>

      <?php if($index+1 === count($footerLicenseList)): ?>
        <?php 
          echo $license;
          break; 
        ?>
      <?php endif;  ?>

      <?php echo $license; ?>
      <span class="siteFooter__cutOff">|</span>

      <!-- <a href="#">公安备案</a>
      <span class="siteFooter__cutOff">|</span>
      <a href="#">网信部备案</a> -->


    <?php endforeach;?>
      

    </ul>
    
    <!-- copyright -->
    <div class="copyright">

      <?php echo $footerCopyright; ?>

      <!-- ©2021 <a href="#">srcmini</a> -->
    </div>
</div>