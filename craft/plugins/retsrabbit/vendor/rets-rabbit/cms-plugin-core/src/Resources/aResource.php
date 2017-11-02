<?php

namespace RetsRabbit\Resources;

use RetsRabbit\ApiService;

abstract class aResource implements iResource
{
    /**
     * ApiService handle
     * @var ApiService
     */
    protected $api = null;

    /**
     * Constructor for MediaResource
     *
     * @param ApiService $api
     */
    public function __construct(ApiService $api)
    {
        $this->api = $api;
    }
}
