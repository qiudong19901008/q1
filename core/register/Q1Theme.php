<?php


namespace q1\core\register;

use hedao\Hedao;

use hedao\core\TSingleton;
use hedao\support\SupportModifyExcerptEnding;
use q1\core\constant\Fields;
use q1\core\constant\Options;

use function hedao\lib\helper\{
  disableGutenbergEditor,
  hideAdminBar,
  registeCategoryTagToPage,
  openThumbnail,
  addDotHtmlSuffixToPageLink,
};

use function q1\core\helper\getQ1Option;

require_once Q1_DIR_PATH . '/core/helper/helper.php';
require_once Q1_DIR_PATH . '/config/config.php';

class Q1Theme{

  use TSingleton;

  protected function __construct(){


    $this->loadConfig();

    Hedao::basic();

    SupportModifyExcerptEnding::getInstance([
      'ending'=>'...'
    ]);

    disableGutenbergEditor();
    hideAdminBar();
    openThumbnail();

    Assets::getInstance();
    Widget::getInstance();
    Menu::getInstance();
    Ajax::getInstance();
    Api::getInstance();

    $this->setupHook();
  }

  protected function setupHook(){

  }

  public function loadConfig(){
    require_once THEME_LOCAL_PATH .'/config/adminOptions.php';
  }

 






}
