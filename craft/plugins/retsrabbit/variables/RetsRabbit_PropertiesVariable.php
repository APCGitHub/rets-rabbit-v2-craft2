<?php

namespace Craft;

use Anecka\RetsRabbit\Transformers\PropertyTransformer;
use League\Fractal\Manager;
use League\Fractal\Resource\Item;
use League\Fractal\Resource\Collection;
use League\Fractal\Serializer\ArraySerializer;

class RetsRabbit_PropertiesVariable
{
	/**
	 * @var Manager
	 */
	private $fractal;

	/**
	 * Cache duration in seconds
	 * 
	 * @var integer
	 */
	private $cacheDuration = 3600;

	/**
	 * RetsRabbit_PropertiesVariable Constructor
	 */
	public function __construct()
	{
		$this->fractal = new Manager();
		$this->fractal->setSerializer(new ArraySerializer);
	}

	/**
	 * @param  $id string
	 * @return array
	 */
	public function find($id = '', $resoParams = array(), $useCache = false, $cacheDuration = null)
	{
		$cacheKey = md5($id . serialize($resoParams));
		$cacheKey = hash('sha256', $cacheKey);
		$data = array();
		$error = false;

		//See if fetching from cache
		if($useCache) {
			$data = craft()->retsRabbit_cache->get($cacheKey);
		}

		//Check if any result pulled from cache
		if(is_null($data) || empty($data)) {
			$res = craft()->retsRabbit_properties->find($id, $resoParams);

			if(!$res->didSucceed()) {
				$error = true;
			} else {
				$data = $res->getResponse()['value'];
				$ttl = $cacheDuration ?: $this->cacheDuration;

				craft()->retsRabbit_cache->set($cacheKey, $data, $ttl);
			}
		}

		$viewData = null;

		if(!$error && !empty($data)) {
			$resources = new Item($data, new PropertyTransformer);
        	$viewData = $this->fractal->createData($resources)->toArray()['data'];
		}

		return $viewData;
	}

	/**
	 * @param  $params array
	 * @return array
	 */
	public function query($params = array(), $useCache = false, $cacheDuration = null)
	{
		$cacheKey = hash('sha256', serialize($params));
		$data = array();
		$error = false;

		//See if fetching from cache
		if($useCache) {
			$data = craft()->retsRabbit_cache->get($cacheKey);
		}

		//Check if any result pulled from cache
		if(is_null($data) || empty($data)) {
			$res = craft()->retsRabbit_properties->search($params);

			if(!$res->didSucceed()) {
				$error = true;
			} else {
				$data = $res->getResponse()['value'];
				$ttl = $cacheDuration ?: $this->cacheDuration;

				craft()->retsRabbit_cache->set($cacheKey, $data, $ttl);
			}
		}

		$viewData = null;

		if(!$error && !empty($data)) {
			$resources = new Collection($data, new PropertyTransformer);
        	$viewData = $this->fractal->createData($resources)->toArray()['data'];
		}

		return $viewData;
	}

	/**
	 * @param  string
	 * @return array
	 */
	public function search($id = '', $useCache = false, $cacheDuration = null)
	{
		$search = craft()->retsRabbit_searches->getById($id);

		if($search) {
			$params = $search->getAttribute('params');
			$params = json_decode($params, true);
			$cacheKey = hash('sha256', serialize($params));
			$data = array();
			$error = false;

			//See if fetching from cache
			if($useCache) {
				$data = craft()->retsRabbit_cache->get($cacheKey);
			}

			if(is_null($data) || empty($data)) {
				$res = craft()->retsRabbit_properties->search($params);

				if(!$res->didSucceed()) {
					$error = true;
				} else {
					$data = $res->getResponse()['value'];
					$ttl = $cacheDuration ?: $this->cacheDuration;

					craft()->retsRabbit_cache->set($cacheKey, $data, $ttl);
				}
			}

			$viewData = null;

			if(!$error && !empty($data)) {
				$resources = new Collection($data, new PropertyTransformer);
	        	$viewData = $this->fractal->createData($resources)->toArray()['data'];
			}

			return $viewData;
		}
	}
}