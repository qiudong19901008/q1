<?php


namespace q1\register;

use hedao\TSingleton;

class Menu{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    add_action( 'after_setup_theme', 'registerMenu' );
  }

 
  public function registerMenu(){
    register_nav_menu( 'primary', '顶部主菜单' );
  }



}
