<?php

use Phalcon\Mvc\Application;
use Phalcon\Config\Adapter\Ini as ConfigIni;

if (!defined('APP_PATH')) define('APP_PATH', realpath('..') . '/');
if (!defined('CONFIG_PATH')) define('CONFIG_PATH', APP_PATH . 'app/config/');

require_once CONFIG_PATH . 'constants.php';

