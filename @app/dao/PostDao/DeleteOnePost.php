<?php

class DeleteOnePost{

  /**
   * @description 删除一篇
   * @param number id 文章id
   * @return 0|1 删除失败则返回0, 成功则是1
   */
  public function run($id){
    $res = 0;
    $result = wp_delete_post($id,true); //WP_POST|null|false 成功则返回被删除的数据, 失败则null|false
    if($result){
      $res = 1;
    }
    return $res;
  }

}

