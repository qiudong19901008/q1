<?php

  $placeHolder = 999999999;
  
  $pages = paginate_links( array_merge( [
          'base'         => str_replace( $placeHolder, '%#%', esc_url( get_pagenum_link( $placeHolder ) ) ),
          'format'       => '?paged=%#%',
          'current'      => max( 1, get_query_var( 'paged' ) ),
          'total'        => $wp_query->max_num_pages,
          'type'         => 'array',
          'show_all'     => false,
          'end_size'     => 1,
          'mid_size'     => 1,
          'prev_next'    => true,
          'prev_text'    => __( '上一页' ),
          'next_text'    => __( '下一页' ),
          'add_fragment' => ''
      ])
  );
  if ( is_array( $pages ) ) {
    $pagination = '<ul class="pagination">';
    foreach ( $pages as $page ) {
        if(strpos($page,'dots')){
          // <a class="pagination__dots">...</a>
          $pagination .= str_replace('page-numbers dots', 'pagination__dots', $page);
        }elseif(strpos($page,'current')){
          $pagination .= str_replace('page-numbers', 'pagination__page pagination__page--current', $page);
        }else{
          $pagination .= str_replace('page-numbers', 'pagination__page', $page);
        }
    }

    $pagination .= '</ul>';
    echo $pagination;
  }

?>

