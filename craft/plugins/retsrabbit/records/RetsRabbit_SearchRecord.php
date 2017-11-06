<?php

namespace Craft;

class RetsRabbit_SearchRecord extends BaseRecord
{
	/**
	 * @return string
	 */
	public function getTableName()
	{
		return 'retsrabbit_searches';
	}

	/**
	 * @return array
	 */
	public function defineAttributes()
	{
		return array(
			'type' => array(AttributeType::String, 'required' => true, 'default' => 'property'),
			'params' => array(AttributeType::String, 'column' => ColumnType::Text 'required' => true),
			'created_at' => array(AttributeType::DateTime, 'required' => true),
		);
	}
}