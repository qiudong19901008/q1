<div class="post-list-container">

      <?php 

        if(have_posts()){
          while(have_posts()){
            the_post();
            ?>
            <div class="post-card-wrapper">
              <?php get_template_part('template/component/post-card'); ?>
            </div>
            <?php
          }
        }
      ?>

</div>