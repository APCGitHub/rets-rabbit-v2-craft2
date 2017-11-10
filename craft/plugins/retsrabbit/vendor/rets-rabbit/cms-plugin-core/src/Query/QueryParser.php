<?php

namespace RetsRabbit\Query;


class QueryParser
{
	/**
	 * @var QueryBuilder
	 */
	private $builder;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$this->builder = new QueryBuilder();
	}

	/**
	 * Format the form params as a RESO query
	 * 
	 * @return array
	 */
	public function format($params)
	{
		$data = array();
		//Grab only {rr:field_name} fields
		$params = $this->filterRetsRabbitFields($params);
		//Remove the {rr} prefix from all fields
		$params = $this->formatRetsRabbitFields($params);

		//build for $filter
		$this->buildFilters($params);

		//parse for $select
		if(isset($params['select'])) {
			$select = $this->formatSelect($params);

			if(!is_null($select)) {
				$this->builder->select($select);
			}
		}

		//parse for $orderby
		if(isset($params['orderby'])) {
			$this->buildOrderBy($params);
		}

		//parse for $skip
		if(isset($params['skip'])) {
			$skip = $this->formatSkip($params);

			if(!is_null($skip)) {
				$this->builder->skip($skip);
			}
		}

		//parse for $top
		if(isset($params['top'])) {
			$top = $this->formatTop($params);

			if(!is_null($top)) {
				$this->builder->limit($top);
			}
		}

		$data = $this->builder->get();

		return $data;
	}

	/* 
	 | -------------------------------------------
	 |			Private Helper Methods
	 | -------------------------------------------
	 */

	/**
	 * @param  $params array
	 */
	private function buildFilters($params = array())
	{
		$filters = $this->getFilterParams($params);

		if(sizeof($filters)) {
			foreach($filters as $f => $value) {
				$stmt = explode('|', $f);

				if(sizeof($stmt) > 1) {
					//Multiple fields means this is an OR statement
					foreach($stmt as $_stmt) {

					}
				} elseif (sizeof($stmt) == 1) {
					//Single field
					$this->buildSingleFilter($stmt[0], $value);
				}
			}
		}
	}

	/**
	 * @param string $fieldData
	 * @param string $value
	 */
	private function buildSingleFilter($fieldData, $value)
	{
		$value = explode('|', $value);
		
		if(($pos = strpos($fieldData, '(')) !== FALSE) {
			$field = substr($fieldData, 0, $pos);
			preg_match_all("/\(([^\)]*)\)/", $fieldData, $matches);

			if(sizeof($matches) > 1) {
				//Get first capturing group match
				$operator = $matches[1][0];

				if(sizeof($value) < 2) {
					//standard single field and value
					$this->builder->where($field, $operator, $value[0]);
				} else {
					//Single field multiple or values
					foreach($value as $v) {
						$this->builder->where(function ($q) {
							$q->orWhere($field, $operator, $v);
						});
					}
				}
			}
		}
	}

	/**
	 * Format the orderby if it exists
	 *
	 * @param  $params array
	 */
	private function buildOrderBy($params = array())
	{
		if(isset($params['orderby'])) {
			$data = $params['orderby'];
			$orders = explode('|', $data);

			foreach($orders as $order) {
				$parts = explode(':', $order);
				$dir = 'asc';
				$field = $parts[0];

				if(sizeof($parts) == 2) {
					$dir = $parts[1];
				}

				$this->builder->orderBy($field, $dir);
			}

		}
	}

	/**
	 * @param  $params array
	 * @return mixed
	 */
	private function formatSelect($params = array())
	{
		$select = null;

		if(isset($params['select'])) {
			$select = explode('|', $params['select']);
		}

		return $select;
	}

	/**
	 * @param  $params array
	 * @return mixed
	 */
	private function formatSkip($params = array())
	{
		$skip = null;

		if(isset($params['skip'])) {
			$skip = $params['skip'];
		}

		return $skip;
	}

	/**
	 * @param  $params array
	 * @return mixed
	 */
	private function formatTop($params = array())
	{
		$top = null;

		if(isset($params['top'])) {
			$top = $params['top'];
		}

		return $top;
	}

	/**
	 * Find all fields prefixed with {rr:}
	 * 
	 * @param  array $params
	 * @return array
	 */
	private function filterRetsRabbitFields($params = array())
	{
		$rrFields = array_filter($params, function ($key) {
			return substr($key, 0, 2) == 'rr';
		}, ARRAY_FILTER_USE_KEY);

		return $rrFields;
	}

	/**
	 * create a new param array which has that {rr:} removed
	 * 
	 * @param  array $params
	 * @return array
	 */
	private function formatRetsRabbitFields($params = array())
	{
		$newParams = array();

		foreach($params as $key => $values) {
			$newKey = substr($key, 3);

			$newParams[$newKey] = $values;
		}

		return $newParams;
	}

	/**
	 * Fetch only params which fall under the $filter param
	 * 
	 * @param  array $params
	 * @return array
	 */
	private function getFilterParams($params = array())
	{
		$filters = array();
		$passThrough = array('orderby', 'select', 'top', 'skip');

		foreach($params as $key => $values) {
			if(!in_array($key, $passThrough)) {
				$filters[$key] = $values;
			}
		}

		return $filters;
	}
}