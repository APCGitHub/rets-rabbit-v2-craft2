<?php

namespace Craft;

class RetsRabbit_SearchModel extends BaseModel
{
	/**
	 * @return string
	 */
	public function __toString()
	{
		return $this->id;
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'id' => AttributeType::Number,
			'type' => AttributeType::String,
			'params' => AttributeType::String,
		);
	}
}