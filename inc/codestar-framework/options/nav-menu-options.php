<?php if ( ! defined( 'ABSPATH' )  ) { die; } // Cannot access directly.

$prefix = '_ripro_menu_options';
CSF::createNavMenuOptions( $prefix, array(
  'data_type' => 'unserialize'
) );
CSF::createSection( $prefix, array(
  'fields' => array(
    array(
        'id'      => 'menu_icon',
        'type'    => 'icon',
        'title'   => '菜单图标',
    ),
    array(
      'id'    => 'is_catmenu',
      'type'  => 'switcher',
      'title' => '高级菜单',
      'desc' => '鼠标滑过展示分类下文章-仅在分类菜单中有效，开启后可以显示最新10篇文章',
    ),
  )
) );
