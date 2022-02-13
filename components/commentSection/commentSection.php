

  <div 
    class="commentSection"
  >
    <div class="commentSection__mask hide">
      <div class="loading"></div>
    </div>
    <div class="commentSection__listWrap">
      <?php 
        get_template_part('template-parts/components/post/commentList/commentList'); 
      ?>
    </div>
    <div class="commentSection__paginationWrap">
      <?php 
        get_template_part('template-parts/components/common/pagination/pagination');  
      ?>
    </div>
    <div class="commentSection__formWrap">
      <?php get_template_part('template-parts/components/post/commentForm/commentForm'); ?>
    </div>
    
  </div>

