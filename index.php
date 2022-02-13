<?php 
  get_header();
?>

    <div class="index">
      <div class="index__container container">
        <main class="index__main">
          <!-- 轮播图 -->

          <!-- 文章列表 -->
          <div class="index__postList">
            <div class="index__postListTitle">
              最新文章
            </div>
            <div class="index__postListWrap">
              <?php 
                get_template_part('components/postList/postList'); 
              ?>
            </div>
            <div class="indexPageContent__paginationWrap">
              <?php 
                get_template_part('components/pagination/pagination'); 
              ?>
            </div>
          </div>
        </main>

        <aside class="index__sidebar">
          <?php  get_sidebar();?>
        </aside>
      </div>
    </div>




<?php 
  get_footer();
?>
