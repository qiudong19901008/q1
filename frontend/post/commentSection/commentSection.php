<div class="commentSection">
  <div class="commentSection__mask hide">
    <div class="loading"></div>
  </div>
  <div class="commentSection__listWrap">
    <?php 
      get_template_part('frontend/post/commentList/commentList'); 
    ?>
  </div>
  <div class="commentSection__paginationWrap">
    <?php 
      get_template_part('frontend/common/pagination/pagination');  
    ?>
  </div>
  <div class="commentSection__formWrap">
    <?php get_template_part('frontend/post/commentForm/commentForm'); ?>
  </div>
  
</div>