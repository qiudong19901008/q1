<?php


namespace q5\register;

use hedao\TSingleton;


class Q5Theme{

  use TSingleton;

  protected function __construct(){

 

    Assets::getInstance();
    

    $this->setupHook();
  }

  protected function setupHook(){

  

  }

  





}
