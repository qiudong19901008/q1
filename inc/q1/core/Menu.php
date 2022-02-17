<?php


namespace q1\core;

use hedao\core\TSingleton;

class Menu{

  use TSingleton;

  protected function __construct()
  {
    $this->setupHook();
  }

  protected function setupHook(){
    add_action( 'after_setup_theme', [$this,'registerMenu'] );
  }

 
  public function registerMenu(){
    register_nav_menu( 'primary', '顶部主菜单' );
  }



}
