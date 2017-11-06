<?php

namespace Craft;

class RetsRabbit_PropertiesController extends BaseController
{
	/**
	 * Allow these endpoints to be hit by anonymous users
	 * @var array
	 */
	protected $allowAnonymous = array('actionSearch');

	/**
	 * Handle a POST search by saving params into the DB and redirecting
	 * to the search results page.
	 * 
	 * @return mixed
	 */
	public function actionSearch()
	{
		$this->requirePostRequest();

		$data = craft()->request->getPost();
		$resoParams = craft()->retsRabbit_forms->toReso($data);
		$search = craft()->retsRabbit_searches->newPropertySearch(array(
			'params' => $resoParams
		));

		if(craft()->retsRabbit_searches->saveSearch($search)) {
			craft()->userSession->setNotice(Craft::t('Search saved'));

			$this->redirectToPostedUrl(array('searchId' => $search->id));
		} else {
			craft()->userSession->setError(Craft::t("Couldn't save search."));
			craft()->urlManager->setRouteVariables(array('search' => $search));
		}
	}
}