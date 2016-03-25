<?php 

use 
	Phalcon\Config
	;

$env = CONFIG_PATH . 'env' . DIRECTORY_SEPARATOR . APP_ENV . DIRECTORY_SEPARATOR;

$getConfig = function($file) use ($env) {
	return file_exists($file = $env . $file) ? require_once($file) : new Config([]);
};

$appConfig = $getConfig('Application.php');
$autoLoadConfig = $getConfig('AutoLoad.php');
$servicesConfig = $getConfig('Services.php');
$sharedServicesConfig = $getConfig('SharedServices.php');

$config = new Config([
	CONFIG_APPLICATION => $appConfig,
	CONFIG_AUTOLOAD => $autoLoadConfig,
	CONFIG_SERVICES => $servicesConfig,
	CONFIG_SHARED_SERVICES => $sharedServicesConfig,
]);

unset($autoLoadConfig, $servicesConfig, $sharedServicesConfig);

return $config;

 ?>