

<?php 
  get_header()
?>
    
    <div class="tag">
      <div class="tag__container container">
        <div class="tag__main">

          <div class="tag__pageTitleCardWrap">
            <?php get_template_part('components/pageTitleCard/pageTitleCard') ?>
          </div>
          <!-- 文章列表 -->
          <div class="tag__postListWithPaginationWrap">
              <?php 
                get_template_part('components/postListWithPagination/postListWithPagination'); 
              ?>
          </div>
        </div>

        <aside class="tag__sidebar">
          <?php  get_sidebar();?>
        </aside>
      </div>
    </div>
    
<?php 
  get_footer();
?>
 