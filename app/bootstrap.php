<?php 

use 
	Phalcon\DI,
	Phalcon\Config,
	Phalcon\Mvc\Application as BaseApplication,
	Phalcon\Loader
	;

class Application extends BaseApplication
{
	/**
	 * @var Phalcon\Config
	 */
	protected $config;

	public function __construct(Config $config)
	{
		$this->setConfig($config);
		$this->registerAutoLoader();
		$this->registerServices();
	}

	protected function registerAutoLoader()
	{
		$config = $this->getConfig();
		$autoLoad = $this->get(CONFIG_AUTOLOAD)->toArray();

		$loader = new Loader();
		foreach ($autoLoad as $m => $v) {
			if (!empty($v)) {
				$method = sprintf('register%s', $m);
				$loader->{$method}($v);				
			}
		}

		$loader->register();
	}

	protected function registerServices() 
	{
		$di = new DI;

		$config = $this->getConfig();
		$services = $config->get(CONFIG_SERVICES)->toArray();
		$sharedServices = $config->get(CONFIG_SHARED_SERVICES)->toArray();

		$setDI = function($method, $settings) use (&$di) {
			foreach ($settings as $m => $v) {
				$di->{$method}($m, $v);
			}
		};

		$setDI('set', $services);
		$setDI('setShared', $sharedServices);
		
		$this->setDI($di);
	}

	protected function setConfig(Config $config)
	{
		$this->config = $config;
		return $this;
	}

	protected function getConfig()
	{
		return $this->config;
	}
}

$config = require_once(CONFIG_PATH . 'config.php');
$app = new Application($config);

return $app;

?>