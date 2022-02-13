<?php 
  get_header();
?>

    <div  class="index">
      <div class="index__container container">
        <div class="index__main">
          <!-- 轮播图 -->
          
          <!-- 文章列表 -->
          <div class="index__postList">
            <div class="index__postListTitle">
              最新文章
            </div>
            <div class="index__postListWithPaginationWrap">
              <?php 
                get_template_part('components/postListWithPagination/postListWithPagination'); 
              ?>
            </div>
          </div>
        </div>

        <aside class="index__sidebar">
          <?php  get_sidebar();?>
        </aside>
      </div>
    </div>




<?php 
  get_footer();
?>
