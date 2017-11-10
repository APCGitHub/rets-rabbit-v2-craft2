<?php

namespace Craft;

use RetsRabbit\Query\QueryParser;

class RetsRabbit_FormsService extends BaseApplicationComponent
{
	/**
	 * Convert form params to RESO standard format
	 * 
	 * @param  $params array
	 * @return array
	 */
	public function toReso($params = array())
	{
		$query = new QueryParser;
		$reso = $query->format($params);

		die(print_r($reso));

		return $reso;
	}
}