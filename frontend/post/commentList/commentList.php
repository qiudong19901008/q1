<div 
  class="commentList" 
  data-url="<?php echo admin_url('admin-ajax.php');?>"
  data-action="<?php echo 'q1_api_get_comments'; ?>"
  data-postid="<?php echo get_the_ID(); ?>"
>

  <div class="commentList__item">
    <div class="commentList__cardWrap">
      <?php get_template_part('frontend/post/commentCard/commentCard'); ?>
    </div>
    <div class="commentList__cardChild">
      <div class="commentList__childCardWrap">
        <?php get_template_part('frontend/post/commentCard/commentCard'); ?>
      </div>
      <div class="commentList__childCardWrap">
        <?php get_template_part('frontend/post/commentCard/commentCard'); ?>
      </div>
      <div class="commentList__childCardWrap">
        <?php get_template_part('frontend/post/commentCard/commentCard'); ?>
      </div>
    </div>
  </div>


  <div class="commentList__item">
    <div class="commentList__cardWrap">
      <?php get_template_part('frontend/post/commentCard/commentCard'); ?>
    </div>
    <div class="commentList__cardChild">
      <div class="commentList__childCardWrap">
        <?php get_template_part('frontend/post/commentCard/commentCard'); ?>
      </div>
      <div class="commentList__childCardWrap">
        <?php get_template_part('frontend/post/commentCard/commentCard'); ?>
      </div>
      <div class="commentList__childCardWrap">
        <?php get_template_part('frontend/post/commentCard/commentCard'); ?>
      </div>
    </div>
  </div>
  
</div>
