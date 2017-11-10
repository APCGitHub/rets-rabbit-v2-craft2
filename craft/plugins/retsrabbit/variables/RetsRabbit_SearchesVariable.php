<?php

namespace Craft;

class RetsRabbit_SearchesVariable
{
	/**
	 * See if a Rets Rabbit search exists.
	 * 
	 * @param  integer $id
	 * @return bool
	 */
	public function exists($id = 0)
	{
		$search = craft()->retsRabbit_searches->getById($id);

		return !is_null($search);
	}
}