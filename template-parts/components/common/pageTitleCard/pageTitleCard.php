<?php 

  $tips='';
  $name='';
  if(is_category()){
    $tips='分类：';
    $name=single_cat_title('',false);
  }elseif(is_tag()){
    $tips='标签：';
    $name=single_tag_title('',false);
  }elseif(is_search()){
    $tips='搜索：';
    $name=$s;
  }

?>
<div class="pageTitleCard">
  <div class="pageTitleCard__title">
    <span><?php echo $tips; ?></span>
    <h1><?php echo $name; ?></h1>
  </div>
  
  <img 
    class="pageTitleCard__bg"
    src="https://siteimage.w2fenx.com/sszas/content/20211205/sszas-content-1638664799934.jpeg" 
    alt=""
  >
</div>