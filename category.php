

<?php 
  get_header()
?>
    
    <div class="category">
      <div class="category__container container">
        <div class="category__main">

          <div class="category__pageTitleCardWrap">
            <?php get_template_part('components/pageTitleCard/pageTitleCard') ?>
          </div>
          <!-- 文章列表 -->
          <div class="category__postListWithPaginationWrap">
              <?php 
                get_template_part('components/postListWithPagination/postListWithPagination'); 
              ?>
          </div>
        </div>

        <aside class="category__sidebar">
          <?php  get_sidebar();?>
        </aside>
      </div>
    </div>
    
<?php 
  get_footer();
?>
 