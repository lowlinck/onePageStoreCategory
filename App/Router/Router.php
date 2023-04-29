<?php
// Router.php

	class Router
	{
		private $routes = [];

		public function addRoute($uriPattern, $controllerName, $actionName)
		{
			$this->routes[] = [
				'uriPattern' => $uriPattern,
				'controllerName' => $controllerName,
				'actionName' => $actionName,
			];
		}

		public function handleRequest()
		{
			$uri = $_SERVER['REQUEST_URI'];
			$method = $_SERVER['REQUEST_METHOD'];
			
			foreach ($this->routes as $route) {
				if (preg_match($route['uriPattern'], $uri, $matches) && $method == 'GET') {
					array_shift($matches);
					

					$controllerName = $route['controllerName'];
					$actionName = $route['actionName'];

					$controller = new $controllerName();
					call_user_func_array([$controller, $actionName], $matches);
					return;
				}
			}

			http_response_code(404);
			echo '404 Not Found';
		}
	}
