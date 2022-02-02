<?php
  use function q1\core\helper\getFooterCustomCode;

?>
 
 <!-- 页脚 -->
 <div class="siteFooterWrapWrap">
    <div class="siteFooterWrap">
      <?php get_template_part( 'template-parts/components/common/siteFooter/siteFooter' ); ?>
    </div>
    
  </div>

  <!-- <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.js"></script> -->
  
 

  <?php wp_footer();?>
    
  </body>
</html>