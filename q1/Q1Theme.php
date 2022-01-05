<?php


namespace q1\register;

use hedao\TSingleton;

class Q1Theme{

  use TSingleton;

  protected function __construct(){

    Assets::getInstance();
    PostMetaBox::getInstance();
    Widget::getInstance();
    Menu::getInstance();
    $this->setupHook();
  }

  protected function setupHook(){
    
  }






}
