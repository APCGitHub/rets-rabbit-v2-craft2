<?php

namespace RetsRabbit\Bridges;

use Craft\Craft;

class CraftBridge implements iCmsBridge
{
    /**
     * Instance of the Craft app global object.
     *
     * @var Craft
     */
    private $app = null;

    /**
     * Rets Rabbit settings in Craft
     * @var array
     */
    private $settings;

    /**
     * Method handle for fetching a token from the CMS
     *
     * @var callable
     */
    private $tokenFetcher = null;

    /**
     * Constructor
     */
    public function __construct()
    {
        $this->app = Craft::app();
        $this->settings = $this->app->plugins->getPlugin('retsRabbit')->getSettings();
    }

    /**
     * Get a handle to the plugin's parent CMS.
     *
     * @return mixed
     */
    public function getCms()
    {
        return $this->app;
    }

    /**
     * Set the method which will fetch tokens from the cache.
     *
     * @param callable $method
     */
    public function setTokenFetcher($method)
    {
        $this->tokenFetcher = $method;
    }

    /**
     * Fetch a saved RR token from the CMS
     *
     * @return string|null
     */
    public function getAccessToken()
    {
        $token = $callable();

        return $token;
    }
}
