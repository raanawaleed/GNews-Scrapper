<?php

namespace Inc;

final class Init
{
	/**
	 * store full list of classes
	 * @return array
	 */
	public static function get_services(): array {
		return [
			Pages\Admin::class,
			Base\Enqueue::class,
			Base\BaseController::class,
			Base\NewsController::class,
		];
	}

	/**
	 * loop through the classes, initialize and call register meth if exist
	 * @return void
	 */
	 public static function register_services(): void {
		foreach (self::get_services() as $class ) {
			$service = self::instantiate($class);
			if (method_exists($service, 'register')) {
				$service->register();
			}
		}
	}

	/**
	 * Initialize the class
	 *
	 * @param $class
	 *
	 */
	private static function instantiate( $class) {
		return new $class();
	}
}