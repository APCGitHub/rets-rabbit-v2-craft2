<?php

namespace Craft;

class RetsRabbitVariable
{
	/**
	 * Call the resource variables
	 * 
	 * @param  string $name
	 * @param  array $arguments
	 * @return object
	 */
	public function __call($name, $arguments)
	{
		$className = "Craft\RetsRabbit_" . ucfirst($name) . "Variable";

		return (class_exists($className)) ? new $className() : null;
	}
}