<?php

namespace Craft;

use RetsRabbit\ApiService;
use RetsRabbit\Bridges\CraftBridge;
use RetsRabbit\Resources\PropertiesResource;

class RetsRabbit_PropertiesService extends BaseApplicationComponent
{
	/**
	 * The api service from the core RR library
	 * 
	 * @var ApiService
	 */
	private $api;

	/**
	 * The properties resource endpoint
	 * 
	 * @var PropertiesResource
	 */
	private $resource;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$bridge = new CraftBridge;
		$bridge->setTokenFetcher(function () {
			return craft()->retsRabbit_cache->get('access_token', true);
		});
		$this->api = new ApiService($bridge);
		$this->api->overrideBaseApiEndpoint('https://stage.retsrabbit.com');
		$this->resource = new PropertiesResource($this->api);
	}

	/**
	 * @param  array
	 * @return array
	 */
	public function search($params = array())
	{
		$res = $this->resource->search($params);

		return $res;
	}

	/**
	 * @param  string
	 * @return array
	 */
	public function find($id = '')
	{
		$res = $this->resource->single($id);

		return $res;
	}
}