<?php

use 
	Phalcon\Mvc\Application,
	Phalcon\Config\Adapter\Ini as ConfigIni
	;

if (!defined('ROOT_PATH')) define('ROOT_PATH', realpath('..') . DIRECTORY_SEPARATOR);
if (!defined('APP_PATH')) define('APP_PATH', ROOT_PATH . 'app' . DIRECTORY_SEPARATOR);
if (!defined('CONFIG_PATH')) define('CONFIG_PATH', APP_PATH . 'app'. DIRECTORY_SEPARATOR . 'config' . DIRECTORY_SEPARATOR);
if (!defined('CONFIG_ENV_PATH')) define('CONFIG_ENV_PATH', CONFIG_PATH . 'env' . DIRECTORY_SEPARATOR);
if (!defined('MVC_PATH')) define('MVC_PATH', APP_PATH . 'mvc' . DIRECTORY_SEPARATOR);

require_once CONFIG_PATH . 'constants.php';
if (!defined('APP_ENV')) define('APP_ENV', ENV_PRODUCTION);

$app = require_once(APP_PATH . 'bootstrap.php');

?>