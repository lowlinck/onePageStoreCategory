<?php


	class Autoload
	{
		private $directories = [];

		public function register()
		{
			spl_autoload_register([$this, 'loadClass']);
		}

		public function addDirectories(array $directories)
		{
			$this->directories = array_merge($this->directories, $directories);
		}

		private function loadClass(string $className)
		{
			$fileName = str_replace('\\', '/', $className) . '.php';
			foreach ($this->directories as $directory) {
				$fullPath = $directory . '/' . $fileName;
				if (file_exists($fullPath)) {
					require_once($fullPath);
					return true;
				}
			}
			return false;
		}
	}
