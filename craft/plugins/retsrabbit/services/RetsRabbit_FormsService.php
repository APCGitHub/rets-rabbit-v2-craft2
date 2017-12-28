<?php

namespace Craft;

use Anecka\RetsRabbit\Core\Query\QueryParser;

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
		$reso = (new QueryParser)->format($params);
		$reso = array_filter($reso, function ($value) {
			return !empty($value);
		});

		RetsRabbitPlugin::log(print_r($reso, true));

		return $reso;
	}
}