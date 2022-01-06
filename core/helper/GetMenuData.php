<?php

class GetMenuData{

  public static function run($locationName){
    $menuId = GetMenuData::_getMenuId($locationName);
    if(empty($menuId)){
      return null;
    }
    return GetMenuData::_getMenuData($menuId);
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

  private static function _getMenuData($menuId){
    $res = [];
    $menuItemList = wp_get_nav_menu_items( $menuId );
    $topMenuList = GetMenuData::_getTopMenuList($menuItemList);
    foreach($topMenuList as $topMenu){
      $topMenu['subMenuList'] = GetMenuData::_getSubMenuList($topMenu,$menuItemList);
      array_push($res,$topMenu);
    }
    return $res;
  }

  private static function _getTopMenuList($menuItemList){
    $res = [];
    foreach($menuItemList as $menuItem){
      $id = $menuItem->ID;
      $title = $menuItem->title;
      $url = $menuItem->url;
      $parentId = $menuItem->menu_item_parent;
      if($parentId == 0){
        array_push($res,[
          'id'=>$id,
          'title'=>$title,
          'url'=>$url,
        ]);
      }
    }
    return $res;
  }

  private static function _getSubMenuList($topMenu,$menuItemList){
    $res = [];
    $topMenuId = $topMenu['id'];
    foreach($menuItemList as $menuItem){
      $id = $menuItem->ID;
      $title = $menuItem->title;
      $url = $menuItem->url;
      $parentId = $menuItem->menu_item_parent;
      if($topMenuId == $parentId){
        array_push($res,[
          'id'=>$id,
          'title'=>$title,
          'url'=>$url,
        ]);
      }
    }
    return $res;
  }

  

}

