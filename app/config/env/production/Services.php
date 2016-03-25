<?php 

use 
	Phalcon\Config,
	Phalcon\Mvc\Router,
	Phalcon\Mvc\Dispatcher,
	Phalcon\Events\Manager as EventsManager,
	Phalcon\Http\Request,
	Phalcon\Http\Response,
	Phalcon\Mvc\View,
	Phalcon\Mvc\Model\Metadata\Memory as MemoryMetaData,
	Phalcon\Mvc\Model\Manager as ModelsManager,
	Phalcon\Mvc\Dispatcher\Exception as DispatcherException
	;

return new Config([
	'router' => function() {
		$router = new Router;

		$router->add('/', [
			'controller' => 'Home',
			'action' => 'index'
			]);

		$router->add('/:controller', [
			'controller' => 1,
			'action' => 'index'
		]);

		$router->add(
		    '/:controller/:action/:params',
		    [
		        'controller' => 1,
		        'action'     => 2,
		        'params'     => 3
		    ]
		);

		return $router;
	},
	'dispatcher' => function() {
		$dispatcher = new Dispatcher;
		$events = new EventsManager;

		$events->attach('dispatch:beforeDispatchLoop', function ($event, $dispatcher) {
			}
		);

		$events->attach('dispatch:beforeException', function($event, $dispatcher, $exception) {
				// Handle 404 Exceptions
				if ($exception instanceof DispatcherException) {
						return false;
				}
			}	
		);

		$dispatcher->setEventsManager($events);
		$dispatcher->setDefaultNamespace('App\Mvc\Controller');
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
		$view->setViewsDir(MVC_PATH . 'view' . DIRECTORY_SEPARATOR . 'views' . DIRECTORY_SEPARATOR)
			->setLayoutsDir('..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'layouts' . DIRECTORY_SEPARATOR)
			->setPartialsDir('..' . DIRECTORY_SEPARATOR . 'templates' . DIRECTORY_SEPARATOR . 'partials' . DIRECTORY_SEPARATOR)
			->setTemplateBefore('main');
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