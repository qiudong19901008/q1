<?php


namespace q1\register;

use hedao\TSingleton;
use q1\constant\Fields;

/**
 * @description 自定义的文章元数据盒子
 * 1. 编辑界面创建box
 * 2. 新增保存
 * 3. 编辑保存
 */
class PostMetaCustomBox{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    //1. 编辑界面创建box
    add_action('add_meta_boxes', [$this,'addCustomPostMetaBoxList'] );
    //2. 新增保存
    add_action( 'publish_post', [$this,'addCustomPostMetaValuesToPost'],20,1);
    //3. 编辑保存
    add_action( 'edit_post', [$this,'updateCustomPostMetaValuesToPost'],20,2);
  }

  /**
   * 添加meta box list
   * 1. 关键词
   * 2. 描述
   */
  public function addCustomPostMetaBoxList(){
    $this->addKeywordMetaBox();
    $this->addDescriptionMetaBox();
  }

  /**
   * 新增保存
   * publish_post：参数一个（$post_ID），点击发布文章时就会被触发
   */
  public function addCustomPostMetaValuesToPost($postId){
    add_post_meta($postId,Fields::Q1_FIELD_POST_KEYWORDS,getPOSTValue(Fields::Q1_FIELD_POST_KEYWORDS,''),true);
    add_post_meta($postId,Fields::Q1_FIELD_POST_DESCRIPTION,getPOSTValue(Fields::Q1_FIELD_POST_DESCRIPTION,''),true);
  }

  /**
   * 编辑保存
   * edit_post：参数两个（$post_ID, $post），只要编辑已经存在的文章就会被触发
   */
  public function updateCustomPostMetaValuesToPost($postId,$post){
    update_post_meta($postId,Fields::Q1_FIELD_POST_KEYWORDS,getPOSTValue(Fields::Q1_FIELD_POST_KEYWORDS,''));
    update_post_meta($postId,Fields::Q1_FIELD_POST_DESCRIPTION,getPOSTValue(Fields::Q1_FIELD_POST_DESCRIPTION,''));
  }


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