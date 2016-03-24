<?php 

use 
	Phalcon\Config,
	Phalcon\Mvc\Router,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Mvc\Request,
	Phalcon\Mvc\Response,
	Phalcon\Mvc\View,
	Phalcon\Mvc\Model\Metadata\Memory as MemoryMetaData,
	Phalcon\Mvc\Model\Manager as ModelsManager
	;

return new Config([
	'router' => function() {
		return new Router;
	},
	'dispatcher' => function() {
		return new Dispatcher;
	},
	'request' => function() {
		return new Request;
	},
	'response' => function() {
		return new Response;
	},
	'view' => function() {
		$view = new View;
		$view->setViewsDir(MVC_PATH . 'views/');
		return $view;
	},
	'modelsMetadata' => function() {
		return new MemoryMetaData;
	},
	'modelsManager' => function() {
		return new ModelsManager;
	}
]);
 ?>