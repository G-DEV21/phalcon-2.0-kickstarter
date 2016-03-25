<?php 

use 
	Phalcon\Config,
	Phalcon\Mvc\Router,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Events\Manager as EventsManager,
	Phalcon\Mvc\Request,
	Phalcon\Mvc\Response,
	Phalcon\Mvc\View,
	Phalcon\Mvc\Model\Metadata\Memory as MemoryMetaData,
	Phalcon\Mvc\Model\Manager as ModelsManager,
	Phalcon\Mvc\Dispatcher\Exception as DispatcherException
	;

return new Config([
	'router' => function() {
		return new Router;
	},
	'dispatcher' => function() {
		$dispatcher = new Dispatcher;
		$events = new EventsManager;

		$events->attach('dispatch:beforeException', function($event, $dispatcher, $exception) {

				// Handle 404 Exceptions
				if ($exception instanceof DispatcherException) {

						return false;
				}
			}	
		);

		$dispatcher->setEventManager($events);

		return $dispatcher;
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
	// 'modelsMetadata' => function() {
	// 	return new MemoryMetaData;
	// },
	// 'modelsManager' => function() {
	// 	return new ModelsManager;
	// }
]);

 ?>