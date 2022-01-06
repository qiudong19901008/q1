<?php



namespace q1\register;

use hedao\TSingleton;
use q1\widget\WidgetAuthor;
use q1\widget\WidgetRecommendPosts;
use q1\widget\WidgetSearch;
use q1\widget\WidgetTagCloud;


class Widget{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    add_action( 'widgets_init', [$this,'registeWidgetTools'] );
    add_action( 'widgets_init', [$this,'registeWidgetSection'] );
    
  }

  public function registeWidgetSection(){
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

  public function registeWidgetTools(){
    register_widget( new \q1\widget\WidgetAuthor() ); //作者卡片
    register_widget( new WidgetRecommendPosts() ); //推荐文章
    register_widget( new WidgetSearch() ); //搜索框
    register_widget( new WidgetTagCloud()); //标签云
  }

  






}
