<?php 
  get_header();
?>


  <div class="index">


    <section class="index__main">
      <div class="index__postList">
        <?php get_template_part('template-parts/components/common/postList/postList');  ?>
      </div>
    </section>

    <section class="index__sidebar">
      <?php  get_sidebar();?>
    </section>

  </div>




<?php 
  get_footer();
?>
