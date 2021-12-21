<?php

class CategoryMetaBoxList{

  public function __construct() {
    $this->_init();
  }

  public function _init(){
    //加载分类时, 创建meta boxes
    add_action( 'add_meta_boxes', [$this,'addCategoryCustomMetaBoxList'] );
    //保存分类时, 保存meta boxes里面的值
    // add_action('save_post', [$this,'saveMetaBoxListValues']);
  }

  /**
   * 添加meta box list
   */
  public function addCategoryCustomMetaBoxList(){
    $this->addKeywordMetaBox();
    // $this->addDescriptionMetaBox();
  }

  /**
   * 保存meta box list 里面的值
   */
  // public function saveMetaBoxListValues(){
  //   global $post;
  //   //keyword
  //   $keyword = get_post_meta($post->ID,Fields::POST_KEYWORD,true);
  //   if(empty($keyword)){
  //     add_post_meta($post->ID,Fields::POST_KEYWORD,$_POST[Fields::POST_KEYWORD]);
  //   }else{
  //     update_post_meta($post->ID,Fields::POST_KEYWORD,$_POST[Fields::POST_KEYWORD]);
  //   }
  //   //description
  //   $keyword = get_post_meta($post->ID,Fields::POST_DESCRIPTION,true);
  //   if(empty($keyword)){
  //     add_post_meta($post->ID,Fields::POST_DESCRIPTION,$_POST[Fields::POST_DESCRIPTION]);
  //   }else{
  //     update_post_meta($post->ID,Fields::POST_DESCRIPTION,$_POST[Fields::POST_DESCRIPTION]);
  //   }
  
  // }


  // --------------------------------------------keyword-----------------

  public function addKeywordMetaBox(){
    $types = ['post_tag'];
    foreach($types as $type){
      add_meta_box(
        Fields::CATEGORY_KEYWORD, //Meta Box在前台页面中的id，可通过JS获取到该Meta Box  
        'seo关键词', //显示的标题 
        [$this,'printKeywordMetaBoxHtml'], //调方法，用于输出Meta Box的HTML代码   
        $type, // 在哪种类型的页面中添加   
        // 'side', // 在哪显示 side|advanced
        // 'default' // 优先级 
      );
    }
  }

  public function printKeywordMetaBoxHtml(){
    // global $post;
    // get_term_meta()
    // $value = get_post_meta( $post->ID, Fields::CATEGORY_KEYWORD, true );
    ?> 
      <input 
        type="text" 
        name="<?php echo Fields::CATEGORY_KEYWORD; ?>" 
        style="width:100%;"
      />

    <?php
  }

  // --------------------------------------------description-----------------
 

}
