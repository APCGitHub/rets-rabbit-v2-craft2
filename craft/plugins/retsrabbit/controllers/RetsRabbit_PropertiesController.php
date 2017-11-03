<?php

namespace Craft;

class RetsRabbit_PropertiesController extends BaseController
{
	protected $allowAnonymous = array('actionSearch');

	public function actionSearch()
	{
		$this->requirePostRequest();

		$data = craft()->request->getPost();
		$resoParams = craft()->retsRabbit_form->toReso($data);

		$this->returnJson($resoParams);
	}
}