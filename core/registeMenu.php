<?php



/**
 * 注册菜单
 */
function registe_menu(){ 
  // 注册菜单
  register_nav_menu( 'primary', '顶部主菜单' );
}
add_action( 'after_setup_theme', 'registe_menu' );
