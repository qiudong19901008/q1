<?php

namespace hedao\lib\helper;

/**
 * 1. 获取bootstrap的分页
 */

/**
 * @description bootstrap分页html
 * @param array params paginate_links函数额外的参数
 */
function getBootstrapPagination(\WP_Query $wp_query = null, bool $echo = true, $params = [], $activeClasses=''){
  if ( null === $wp_query ) {
      global $wp_query;
  }
  $add_args = [];

  //add query (GET) parameters to generated page URLs
  /*if (isset($_GET[ 'sort' ])) {
      $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
  }*/

  $placeHolder = 999999999;

  $pages = paginate_links( array_merge( [
          'base'         => str_replace( $placeHolder, '%#%', esc_url( get_pagenum_link( $placeHolder ) ) ),
          'format'       => '?paged=%#%',
          'current'      => max( 1, get_query_var( 'paged' ) ),
          'total'        => $wp_query->max_num_pages,
          'type'         => 'array',
          'show_all'     => false,
          'end_size'     => 3,
          'mid_size'     => 1,
          'prev_next'    => true,
          'prev_text'    => __( '上一页' ),
          'next_text'    => __( '下一页' ),
          'add_args'     => $add_args,
          'add_fragment' => ''
      ], $params )
  );

  if ( is_array( $pages ) ) {
      //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
      // <nav aria-label="Page navigation">
      $pagination = '<ul class="pagination">';

      foreach ( $pages as $page ) {

          if(strpos($page,'current')){
              $pagination .= '<li class="page-item active"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
          }else{
              $pagination .= '<li class="page-item"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
          }
          
          // $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
      }

      $pagination .= '</ul>';
      // </nav>

      if ( $echo ) {
          echo $pagination;
      } else {
          return $pagination;
      }
  }

  return '';

}


/**
 * @description bootstrap分页html
 * @param array params paginate_links函数额外的参数
 */
function getCustomPagination(\WP_Query $wp_query = null, bool $echo = true, $params = [], $activeClasses=''){
    if ( null === $wp_query ) {
        global $wp_query;
    }
    $add_args = [];
  
    //add query (GET) parameters to generated page URLs
    /*if (isset($_GET[ 'sort' ])) {
        $add_args[ 'sort' ] = (string)$_GET[ 'sort' ];
    }*/
  
    $placeHolder = 999999999;
  
    $pages = paginate_links( array_merge( [
            'base'         => str_replace( $placeHolder, '%#%', esc_url( get_pagenum_link( $placeHolder ) ) ),
            'format'       => '?paged=%#%',
            'current'      => max( 1, get_query_var( 'paged' ) ),
            'total'        => $wp_query->max_num_pages,
            'type'         => 'array',
            'show_all'     => false,
            'end_size'     => 3,
            'mid_size'     => 1,
            'prev_next'    => true,
            'prev_text'    => __( '上一页' ),
            'next_text'    => __( '下一页' ),
            'add_args'     => $add_args,
            'add_fragment' => ''
        ], $params )
    );
  
    if ( is_array( $pages ) ) {
        //$current_page = ( get_query_var( 'paged' ) == 0 ) ? 1 : get_query_var( 'paged' );
        // <nav aria-label="Page navigation">
        $pagination = '<ul class="pagination">';
  
        foreach ( $pages as $page ) {
  
            if(strpos($page,'current')){
                $pagination .= '<li class="page-item active"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
            }else{
                $pagination .= '<li class="page-item"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
            }
            
            // $pagination .= '<li class="page-item' . (strpos($page, 'current') !== false ? ' active' : '') . '"> ' . str_replace('page-numbers', 'page-link', $page) . '</li>';
        }
  
        $pagination .= '</ul>';
        // </nav>
  
        if ( $echo ) {
            echo $pagination;
        } else {
            return $pagination;
        }
    }
  
    return '';
  
  }


