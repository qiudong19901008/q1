<?php
  use function q1\helper\getFooterCustomCode;

?>
 
 <!-- 页脚 -->
 <div class="siteFooterWrapWrap">
    <div class="siteFooterWrap">
      <?php get_template_part( 'q1/component/siteFooter/siteFooter' ); ?>
    </div>
    
  </div>

  <script src="https://cdn.bootcdn.net/ajax/libs/jquery/3.6.0/jquery.js"></script>
  
  <?php wp_footer();?>
  <?php echo getFooterCustomCode(); ?>
    
  </body>
</html>