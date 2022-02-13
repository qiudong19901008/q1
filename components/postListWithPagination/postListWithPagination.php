
<div class="postListWithPagination">

  <!-- post list -->
  <div class="postListWithPagination__postList">

    <?php 
      if(have_posts()):
        while(have_posts()):
          the_post();
    ?>

    <div class="postListWithPagination__CardWrap">
      <?php 
        get_template_part('components/postCard/postCard');
      ?>
    </div>

    <?php  
        endwhile;
      endif;
    ?>

  </div>

  <!-- post pagination -->
  <div class="postListWithPagination__paginationWrap">
    <?php 
      get_template_part('components/pagination/pagination'); 
    ?>
  </div>


</div>