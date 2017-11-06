<?php

namespace Craft;

class RetsRabbit_SearchesService extends BaseApplicationComponent
{
	/**
	 * Search record instance
	 * 
	 * @var RetsRabbit_SearchRecord
	 */
	protected $searchRecord;

	/**
	 * @param mixed
	 */
	public function __construct($searchRecord = null)
	{
		$this->searchRecord = $searchRecord;

		if(is_null($this->searchRecord)) {
			$this->searchRecord = RetsRabbit_SearchRecord::model();	
		}
	}

	/**
	 * Create a new search model
	 * 
	 * @param  array
	 * @return BaseModel
	 */
	public function newSearch($attributes = array())
	{
		$model = new RetsRabbit_SearchModel();
		$model->setAttributes($attributes);

		return $model;
	}

	/**
	 * Create a new search model with a 'property' type
	 * 
	 * @param  array
	 * @return BaseModel
	 */
	public function newPropertySearch($attributes = array())
	{
		$attributes['type'] = 'property';

		return $this->newSearch($attributes);
	}

	/**
	 * Find a search by id
	 * 
	 * @param  $id integer
	 * @return BaseModel|null
	 */
	public function getById($id = 0)
	{
		$record = $this->searchRecord->findById($id);

		if($record) {
			return RetsRabbit_SearchModel::populateModel($record);
		}

		return null;
	}

	/**
	 * Delete a search by id
	 * 
	 * @param  $id integer
	 * @return mixed
	 */
	public function deleteById($id = 0)
	{
		return $this->searchRecord->deleteById($id);
	}
}