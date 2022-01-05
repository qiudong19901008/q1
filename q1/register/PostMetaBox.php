<?php


namespace q1\register;

use hedao\TSingleton;
use q1\Fields;

class PostMetaBox{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    //加载文章时, 创建meta boxes
    add_action('add_meta_boxes', [$this,'addPostCustomMetaBoxList'] );
  }

  /**
   * 添加meta box list
   */
  public function addPostCustomMetaBoxList(){
    $this->addKeywordMetaBox();
    $this->addDescriptionMetaBox();
  }


  // --------------------------------------------keyword-----------------

  public function addKeywordMetaBox(){
    $types = ['post'];
    foreach($types as $type){
      add_meta_box(
        Fields::Q1_FIELD_POST_KEYWORDS, //Meta Box在前台页面中的id，可通过JS获取到该Meta Box  
        'seo关键词', //显示的标题 
        [$this,'printKeywordMetaBoxHtml'], //调方法，用于输出Meta Box的HTML代码   
        $type, // 在哪种类型的页面中添加   
        // 'side', // 在哪显示 side|advanced
        // 'default' // 优先级 
      );
    }
  }

  public function printKeywordMetaBoxHtml(){
    global $post;
    $value = get_post_meta( $post->ID, Fields::Q1_FIELD_POST_KEYWORDS, true );
    ?> 
      <input 
        type="text" 
        name="<?php echo Fields::Q1_FIELD_POST_KEYWORDS; ?>" 
        value="<?php echo $value ?>"
        style="width:100%;"
      />

    <?php
  }

  // --------------------------------------------description-----------------
  public function addDescriptionMetaBox(){
    $types = ['post'];
    foreach($types as $type){
      add_meta_box(
        Fields::Q1_FIELD_POST_DESCRIPTION, //Meta Box在前台页面中的id，可通过JS获取到该Meta Box  
        'seo描述', //显示的标题 
        [$this,'printDescriptionMetaBoxHtml'], //调方法，用于输出Meta Box的HTML代码   
        $type, // 在哪种类型的页面中添加   
        // 'side', // 在哪显示 side|advanced
        // 'default' // 优先级 
      );
    }
  }

  public function printDescriptionMetaBoxHtml(){
    global $post;
    $value = get_post_meta( $post->ID, Fields::Q1_FIELD_POST_DESCRIPTION, true );
    ?> 
      <textarea 
        type="text"
        style="width:100%;"
        name="<?php echo Fields::Q1_FIELD_POST_DESCRIPTION; ?>"
        value="<?php 
        ?>"
        rows=8  
      ><?php echo $value; ?></textarea>
    <?php
  }
}