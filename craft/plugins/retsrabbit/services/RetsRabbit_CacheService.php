<?php

namespace Craft;

class RetsRabbit_CacheService extends BaseApplicationComponent
{
	/**
	 * The base for all rets rabbit cache items
	 * 
	 * @var string
	 */
	private $basePath = '/rets-rabbit/';

	/**
	 * @param string
	 * @param mixed
	 * @param int
	 * @param boolean
	 */
	public function set($id, $value, $expire, $secure = false)
	{
		$key = $this->basePath . $id;

		if($secure) {
			$value = craft()->security->encrypt($value);
		}

		return craft()->cache->add($key, $value, $expire);
	}

	/**
	 * @param  string
	 * @param  boolean
	 * @return mixed|null
	 */
	public function get($id, $secure = false)
	{
		$key = $this->basePath . $id;
		$value = craft()->cache->get($key);

		if($value && $secure) {
			$value = craft()->security->decrypt($value);
		}

		return $value;
	}

	/**
	 * @param  string
	 * @return boolean
	 */
	public function delete($id)
	{
		$key = $this->basePath . $id;

		return craft()->cache()->delete($key);		
	}
}