<?php

namespace Craft;

class RetsRabbitVariable
{
	/**
	 * Call the resource variables
	 * 
	 * @param  $name string
	 * @param  $arguments array
	 * @return object
	 */
	public function __call($name, $arguments)
	{
		$className = "Craft\RetsRabbit_" . ucfirst($name) . "Variable";

		return (class_exists($className)) ? new $className() : null;
	}
}