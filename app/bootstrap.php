<?php 

use 
	Phalcon\Config,
	Phalcon\Mvc\Application as BaseApplication
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
	}

	protected function registerAutoLoader()
	{
		// $config = $confi
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

?>