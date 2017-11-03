<?php

namespace Craft;

class RetsRabbit_FormService extends BaseApplicationComponent
{
	/**
	 * Convert form params to RESO standard format
	 * 
	 * @param  $params array
	 * @return array
	 */
	public function toReso($params = array())
	{
		$reso = array();

		//TODO: Call rr core lib method to transform the $params data

		return $reso;
	}
}