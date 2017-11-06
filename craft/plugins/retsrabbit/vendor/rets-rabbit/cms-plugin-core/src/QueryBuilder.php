<?php

namespace RetsRabbit\QueryBuilder;

class QueryBuilder
{
	/**
	 * Format the form params as a RESO query
	 * 
	 * @return array
	 */
	public function format($params)
	{
		$data = array();
		$params = $this->filterRetsRabbitFields($params);

		if(isset($params['filter'])) {
			$filter = $this->formatFilter($params);

			if(!is_null($filter)) {
				$data['$filter'] = $filter;
			}
		}

		if(isset($params['select'])) {
			$select = $this->formatSelect($params);

			if(!is_null($select)) {
				$data['$select'] = $select;
			}
		}

		if(isset($params['orderby'])) {
			$orderby = $this->formatOrderBy($params);

			if(!is_null($orderby)) {
				$data['$orderby'] = $orderby;
			}
		}

		if(isset($params['skip'])) {
			$skip = $this->formatSkip($params);

			if(!is_null($skip)) {
				$data['$skip'] = $skip;
			}
		}

		if(isset($params['top'])) {
			$top = $this->formatSkip($params);

			if(!is_null($top)) {
				$data['$top'] = $top;
			}
		}

		return $data;
	}

	/**
	 * @param  $params array
	 * @return mixed
	 */
	private function formatFilter($params = array())
	{
		$filter = null;

		return $filter;
	}

	/**
	 * Format the orderby if it exists
	 *
	 * @param  $params array
	 * @return mixed
	 */
	private function formatOrderBy($params = array())
	{
		$orderby = null;

		if(isset($params['orderby'])) {
			$data = $params['orderby'];
			$orderby = array();
			$orders = explode('|', $data);

			foreach($orders as $order) {
				$parts = explode(':', $order);
				$dir = 'asc';
				$field = $parts[0];

				if(sizeof($parts) == 2) {
					$dir = $parts[1];
				}

				$orderby[] = "$field $dir";
			}

			$orderby = implode(', ', $orderby);
		}

		return $orderby;
	}

	/**
	 * @param  $params array
	 * @return mixed
	 */
	private function formatSelect($params = array())
	{
		$select = null;

		if(isset($params['select'])) {
			$select = explode('|', $params['selects']);
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
	 * Find all fields prefixed with {rr:} and create a new param array
	 * whic has that {rr:} removed.
	 * 
	 * @param  $params array
	 * @return array
	 */
	private function filterRetsRabbitFields($params = array())
	{
		$newParams = array();

		$rrFields = array_filter($params, function ($key) {
			return substr($key, 0, 2) == 'rr';
		});

		foreach($rrFields as $key => $values) {
			$newKey = substr(3);

			$newParams[$newKey] = $values;
		}

		return $newParams;
	}
}