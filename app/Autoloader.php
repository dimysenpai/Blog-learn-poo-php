<?php

	namespace App;

	/**
	 * Class Autoloader
	 * @package App
	 */

	class Autoloader {
		/**
		 * Enregistre L'autoloader
		 */

		static function register() {
			spl_autoload_register(array(__CLASS__, 'autoload'));
		}

		/**
		 * Inclure le fichier corespondant à la classe
		 * @param $class string Le nom de la classe à charger
		 */

		static function autoload($class) {
			if (strpos($class, __NAMESPACE__ . '\\') === 0) {
				$class = str_replace(__NAMESPACE__ . '\\', '', $class);
				$class = str_replace('\\', '/', $class);
				require __DIR__ . '/' . $class . '.php';
			}
		}
	}