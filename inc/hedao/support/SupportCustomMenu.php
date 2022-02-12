<?php

namespace hedao\support;

use hedao\core\TSingleton;

/**
 * 支持自定义menu
 * 1. li的class
 * 2. li的active class
 * 3. a的class
 */
class SupportCustomMenu{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    add_filter( 'nav_menu_css_class', [$this,'addLiAndActiveClass'], 10,3 );
    add_filter( 'nav_menu_link_attributes', [$this,'addAClass'], 10,3 );
  }


  // 
  public function addLiAndActiveClass($classes,$item,$args){

      $classes[] = $args->li_class;

      if(in_array('current-menu-item',$classes)){
        $classes[] = $args->li_active_class;
      }

      return $classes;
  }

  // 
  public function addAClass($attrs,$item,$args){
		$attrs['class'] = $args->a_class;
    if($item->current){
      $classes[] = $args->a_active_class;
    }
		return $attrs;
  }
}

