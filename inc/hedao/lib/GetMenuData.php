<?php

namespace hedao\lib;

use function hedao\lib\helper\console;

class GetMenuData{

  public static function run($locationName){
    $menuId = GetMenuData::_getMenuId($locationName);
    if(empty($menuId)){
      return [];
    }
    return GetMenuData::_getMenuData($menuId);
  }

  public static function getRawMenuData($locationName){
    $menuId = GetMenuData::_getMenuId($locationName);
    return wp_get_nav_menu_items( $menuId );
  }

  private static function _getMenuId($locationName){
    $res = [];
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
      $parentId = $menuItem->menu_item_parent;
      if($parentId == 0){
        $data = self::_getOneMenuData($menuItem);
        array_push($res,$data);
      }
    }
    return $res;
  }

  private static function _getSubMenuList($topMenu,$menuItemList){
    $res = [];
    $topMenuId = $topMenu['id'];
    foreach($menuItemList as $menuItem){
      $parentId = $menuItem->menu_item_parent;
      if($topMenuId == $parentId){
        $data = self::_getOneMenuData($menuItem);
        array_push($res,$data);
      }
    }
    return $res;
  }

  private static function _getOneMenuData($menuItem){
    $id = $menuItem->object_id; //这是文章 category tag的真实id
    $title = $menuItem->title;  
    $url = $menuItem->url;
    $menuId = $menuItem->ID; 
    $type = $menuItem->object; // post_tag category post
    $res = [
      'id' => $id,
      'title'=>$title,
      'url' => $url,
      'type' => $type,
      'menuId' => $menuId,
    ];
    return $res;
  }

  

}

