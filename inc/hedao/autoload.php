<?php


namespace hedao;

define('THEME_LOCAL_PATH',get_template_directory());
define('THEME_HTTP_PATH',get_template_directory_uri());

require_once __DIR__ . '/config/config.php';
require_once __DIR__ .'/inc/codestar/codestar.php'; 

require_once __DIR__ . '/core/Loader.php';

require_once __DIR__ . '/lib/helper/helper.php';
require_once __DIR__ . '/lib/exceptions.php';

use hedao\core\Loader;


Loader::run();







