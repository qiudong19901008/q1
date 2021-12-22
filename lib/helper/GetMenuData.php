<?php

class GetMenuData{

  public static function run($locationName){
    $menuId = GetMenuData::_getMenuId($locationName);
    if(empty($menuId)){
      return null;
    }
    
  }

  private static function _getMenuId($locationName){
    $res = null;
    $locationList = get_nav_menu_locations();
    foreach($locationList as $name=>$id){
      if($name == $locationName){
        $res = $id;
      }
    }
    return $res;
  }

}

