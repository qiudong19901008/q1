<?php


namespace q1\core\register;

use hedao\lib\traits\TSingleton;
use function hedao\lib\helper\{
  getPOSTValue
};



/**
 * @description 自定义的文章元数据盒子
 * 1. 编辑界面创建box
 * 2. 新增保存
 * 3. 编辑保存
 */
class PostMetaCustomBox{

  use TSingleton;

  private $_descriptionFieldName;
  private $_keywordsFieldName;
  private $_typeArr;

  /**
   * @param array $params [descriptionFieldName:string,keywordsFieldName:string,typeArr:('post'|'page')[]]
   */
  protected function __construct($params)
  {
    $this->_descriptionFieldName = $params['descriptionFieldName'];
    $this->_keywordsFieldName = $params['keywordsFieldName'];
    $this->_typeArr = $params['typeArr'];

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
   * 新增保存
   * publish_post：参数一个（$post_ID），点击发布文章时就会被触发
   */
  public function addCustomPostMetaValuesToPost($postId){
    add_post_meta($postId,$this->_keywordsFieldName,getPOSTValue($this->_keywordsFieldName,''),true);
    add_post_meta($postId,$this->_descriptionFieldName,getPOSTValue($this->_descriptionFieldName,''),true);
  }

  /**
   * 编辑保存
   * edit_post：参数两个（$post_ID, $post），只要编辑已经存在的文章就会被触发
   */
  public function updateCustomPostMetaValuesToPost($postId,$post){
    update_post_meta($postId,$this->_keywordsFieldName,getPOSTValue($this->_keywordsFieldName,''));
    update_post_meta($postId,$this->_descriptionFieldName,getPOSTValue($this->_descriptionFieldName,''));
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


  // --------------------------------------------keywords-----------------

  public function addKeywordMetaBox(){
    // $types = ['post'];
    foreach($this->_typeArr as $type){
      add_meta_box(
        $this->_keywordsFieldName, //Meta Box在前台页面中的id，可通过JS获取到该Meta Box  
        'seo关键词', //显示的标题 
        [$this,'printKeywordMetaBoxHtml'], //调方法，用于输出Meta Box的HTML代码   
        $type, // 在哪种类型的页面中添加   
        // 'side', // 在哪显示 side|advanced
        // 'default' // 优先级 
      );
      // var_dump($this->_keywordsFieldName);
      // die;
    }
  }

  public function printKeywordMetaBoxHtml(){
    global $post;
    $value = get_post_meta( $post->ID, $this->_keywordsFieldName, true );
    ?> 
      <input 
        type="text" 
        name="<?php echo $this->_keywordsFieldName; ?>" 
        value="<?php echo $value ?>"
        style="width:100%;"
      />

    <?php
  }

  // --------------------------------------------description-----------------
  public function addDescriptionMetaBox(){
    // $types = ['post'];
    foreach($this->_typeArr as $type){
      add_meta_box(
        $this->_descriptionFieldName, //Meta Box在前台页面中的id，可通过JS获取到该Meta Box  
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
    $value = get_post_meta( $post->ID, $this->_descriptionFieldName, true );
    ?> 
      <textarea 
        type="text"
        style="width:100%;"
        name="<?php echo $this->_descriptionFieldName; ?>"
        value="<?php 
        ?>"
        rows=8  
      ><?php echo $value; ?></textarea>
    <?php
  }
}




 // private function _registePublishAction(){
  //   foreach($this->_typeArr as $type){
  //     switch($type){
  //       case 'page':
  //         add_action( 'publish_page', [$this,'addCustomPostMetaValuesToPost'],20,1);
  //         break;
  //       case 'post':
  //         default:
  //         add_action( 'publish_post', [$this,'addCustomPostMetaValuesToPost'],20,1);
  //     }
  //   }
  // }

  // private function _registeEditAction(){
  //   foreach($this->_typeArr as $type){
  //     switch($type){
  //       case 'page':
  //         add_action( 'edit_page', [$this,'addCustomPostMetaValuesToPost'],20,2);
  //         break;
  //       case 'post':
  //         default:
  //         add_action( 'edit_post', [$this,'addCustomPostMetaValuesToPost'],20,2);
  //     }
  //   }
  // }