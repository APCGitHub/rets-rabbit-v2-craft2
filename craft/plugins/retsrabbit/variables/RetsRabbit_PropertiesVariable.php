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

	public function __construct()
	{
		$this->fractal = new Manager();
		$this->fractal->setSerializer(new ArraySerializer);
	}

	/**
	 * @param  $id string
	 * @return array
	 */
	public function find($id = '')
	{
		$listing = craft()->retsRabbit_properties->find($id);
        $resources = new Item($data, new PropertyTransformer);
        $viewData = $this->fractal->createData($resources)->toArray()['data'];

		return $viewData;
	}

	/**
	 * @param  $params array
	 * @return array
	 */
	public function query($params = array())
	{
		$listings = craft()->retsRabbit_properties->query($params);

        $resources = new Collection($listings, new PropertyTransformer);
        $viewData = $this->fractal->createData($resources)->toArray()['data'];

		return $listings;
	}

	/**
	 * @param  string
	 * @return array
	 */
	public function search($id = '')
	{
		$listings = craft()->retsRabbit_properties->search($id);

        $resources = new Collection($listings, new PropertyTransformer);
        $viewData = $this->fractal->createData($resources)->toArray()['data'];

		return $listings;
	}
}