<?php
// Controllers/Controller.php

	class Controller
	{
		protected function render($viewName, $params = [])
		{
			extract($params);
			include(__DIR__ . '/../Views/' . $viewName . '.php');
		}
	}
