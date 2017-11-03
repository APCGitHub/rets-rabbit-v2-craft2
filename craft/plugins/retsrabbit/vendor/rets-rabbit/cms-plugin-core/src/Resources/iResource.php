<?php

namespace RetsRabbit\Resources;

interface iResource
{
    /**
     * Fetch a single resource by id
     * @param  int|string $id
     * @param  array  $params
     * @return ApiResponse
     */
    public function single($id, $params = array());

    /**
     * Search against the resource
     *
     * @param  array  $params
     * @return ApiResponse
     */
    public function search($params = array());

    /**
     * Fetch resource metadata
     *
     * @param array $params
     * @return ApiResponse
     */
    public function metadata($params = array());

    /**
     * Run a raw query with RESO defined params:
     * 
     * 1. $select
     * 2. $filter
     * 3. $top
     * 4. $orderby
     * 5. $skip
     * 
     * @param  array $params
     * @return ApiResponse
     */
    public function query($params = array());
}
