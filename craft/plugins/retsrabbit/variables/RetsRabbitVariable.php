<?php

namespace Craft;

class RetsRabbitVariable
{
	/**
	 * @param  array
	 * @return array
	 */
	public function properties($params = array())
	{
		if(is_null($id) || empty($params)) {
			throw new \Exception("You must pass in an associative array of params.");
		}

		$results = craft()->retsRabbit_properties->search($params);

		return $results;
	}

	/**
	 * @param  string
	 * @return array
	 */
	public function property($id = '')
	{
		if(is_null($id) || empty($id)) {
			throw new \Exception("You must pass in a valid listing ID");
		}

		$listing = craft()->retsRabbit_properties->find($id);

		return $listing;
	}
}