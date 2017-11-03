<?php

namespace Craft;

use RetsRabbit\ApiService;
use RetsRabbit\Bridges\CraftBridge;

class RetsRabbit_TokensService extends BaseApplicationComponent
{
	/**
	 * @var ApiService
	 */
	private $api;

	/** 
	 * @var mixed
	 */
	private $settings;

	/**
	 * Constructor
	 */
	public function __construct()
	{
		$bridge = new CraftBridge;
		$this->api = new ApiService($bridge);
		$this->api->overrideBaseApiEndpoint('https://stage.retsrabbit.com');
		$this->settings = craft()->plugins->getPlugin('retsRabbit')->getSettings();
	}

	/**
	 * Try to fetch a new access token from the RR API.
	 * 
	 * @return mixed|null
	 */
	public function refresh()
	{
		$token = null;

		try {
			$res = $this->api->getAccessToken([
	            'client_id' => $this->settings->clientId,
	            'client_secret' => $this->settings->clientSecret
	        ]);

	        if($res->didSucceed()) {
	            $content = $res->getResponse();
	            $token = $content['access_token'];
	            $ttl = $content['expires_in'];

	            craft()->retsRabbit_cache->set('access_token', $token, $ttl, true);
	        } else {
	        	RetsRabbitPlugin::log('Could not fetch the access token.', LogLevel::Error);
	        }
		} catch (\Exception $e) {
			RetsRabbitPlugin::log($e->getMessage(), LogLevel::Error);
		}

        return $token;
	}

	/**
	 * @return boolean
	 */
	public function isValid()
	{
		$token = craft()->retsRabbit_cache->get('access_token', true);

        if(is_null($token) || empty($token))
            return false;

        return true;
	}
}