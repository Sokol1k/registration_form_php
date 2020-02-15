<?php

namespace App\Core;

use Exception;

class Route
{
	static function start()
	{
		$controllerName = 'ControllerParticipants';
		$actionName = 'Index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);

		if ( !empty($routes[2]) )
		{	
			$controllerName = $routes[2];
		}
		
		if ( !empty($routes[3]) )
		{
			$actionName = $routes[3];
		}

		$action = 'action'.$actionName;
		$controllerName = "App\\Controllers\\$controllerName";

		try {
			$controller = new $controllerName;
			if(method_exists($controller, $action)) {
				$controller->$action();
			} else {
				throw new Exception("404 Page not found");
			}
		} catch (Exception $e) {
			echo $e->getMessage();
		}
	
	}
}