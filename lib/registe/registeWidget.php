<?php


/**
 * 注册小工具栏目, 也就是前台要显示的位置
 */
function registe_widget_section() {

  // 右边栏
  register_sidebar(
    [
      'name' => '右侧栏',
      'id' => 'right-sidebar',
      'before_widget' => '<div class="mb-2 radius">',
      'after_widget' => '</div>',
      'before_title' => '',
      'after_title' => '',
    ]
  );
}
add_action( 'widgets_init', 'registe_widget_section' );

/**
 * 注册小工具
 */
function registe_widget_list() {
  register_widget( 'WidgetAuthor' );
  register_widget( 'WidgetRecommendPosts' );
  register_widget( 'WidgetSearch' );
  register_widget('WidgetTagCloud');
}
add_action( 'widgets_init', 'registe_widget_list' );