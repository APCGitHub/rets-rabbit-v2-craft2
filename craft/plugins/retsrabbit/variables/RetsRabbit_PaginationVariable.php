<?php

namespace Craft;

class RetsRabbit_PaginationVariable
{
	/**
	 * @param  integer $searchId
	 * @param  string $type
	 * @return PaginateVariable
	 */
	public function properties($searchId = 0, $perPage = null, $type = 'estimated')
	{
		$select = array('$select' => 'estimated_results');
		$paginateV = new PaginateVariable;
		$search = craft()->retsRabbit_searches->getById($searchId);

		if($type == 'exact') {
			$select['$select'] = 'total_results';
		}

		if($search) {
			$params = json_decode($search->getAttribute('params'), true);
			$params = array_merge($params, $select);
			$cacheKey = 'pagination/' . hash('sha256', serialize($params));
			$currentPage = craft()->request->getPageNum();
			$total = craft()->retsRabbit_cache->get($cacheKey);
			$error = false;

			if(is_null($total) || $total === FALSE) {
				$res = craft()->retsRabbit_properties->search($params);

				if(!$res->didSucceed()) {
					$error = true;
				} else {
					$total = $res->getResponse()['@retsrabbit.total_results'];
					craft()->retsRabbit_cache->set($cacheKey, $total, 3600);
				}
			}

			if($error || $total == 0) {
				return $paginateV;
			}

			if(!$perPage) {
				$perPage = $total;
			}

			$totalPages = ceil($total / $perPage);

			if($totalPages == 0) {
				return $paginateV;
			}

			if ($currentPage > $totalPages) {
				$currentPage = $totalPages;
			}

			$offset = $perPage * ($currentPage - 1);
			$last = $offset + $perPage;

			if($last > $total) {
				$last = $total;
			}

			$paginateV->first = $offset + 1;
			$paginateV->last = $last;
			$paginateV->total = $total;
			$paginateV->currentPage = $currentPage;
			$paginateV->totalPages = $totalPages;
		}

		return $paginateV;
	}
}