<?php

namespace Craft;

use RetsRabbit\QueryBuilder;

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
		$queryBuilder = new QueryBuilder;
		$reso = $queryBuilder->format($params);

		return $reso;
	}
}