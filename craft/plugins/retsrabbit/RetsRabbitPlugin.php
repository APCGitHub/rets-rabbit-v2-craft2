<?php

namespace Craft;

class RetsRabbitPlugin extends BasePlugin
{
	public function getName()
	{
		return Craft::t('Rets Rabbit');
	}

	public function getVersion()
	{
		return '0.1';
	}

	public function getDeveloper()
	{
		return 'Anecka';
	}

	public function getDeveloperUrl()
	{
		return 'http://anecka.com';
	}

	public function getSettingsHtml()
	{
		$valid = craft()->retsRabbit_tokens->isValid();
		$canHitApi = craft()->retsRabbit_properties->search(array(
			'$top' => 1
		));

		return craft()->templates->render('retsrabbit/_settings', array(
           'settings' => $this->getSettings(),
           'tokenExists' => $valid,
           'canHitApi' => $canHitApi
       ));
	}

	protected function defineSettings()
	{
		return array(
			'clientId' => array(AttributeType::String),
			'clientSecret' => array(AttributeType::String),
			'apiEndpoint' => array(AttributeType::String)
		);
	}

	public function init()
	{
		require_once __DIR__ .'/vendor/autoload.php';

		Craft::import('plugins.retsrabbit.helpers.RetsRabbit_SearchCriteriaModel');

		$valid = craft()->retsRabbit_tokens->isValid();

		if(!$valid) {
			craft()->retsRabbit_tokens->refresh();
		}
	}

	public function addTwigExtension()
	{
		Craft::import('plugins.retsrabbit.twigextensions.RetsRabbit_Paginate_TokenParser');
		Craft::import('plugins.retsrabbit.twigextensions.RetsRabbit_Paginate_Node');
		Craft::import('plugins.retsrabbit.twigextensions.RetsRabbit_Twig_Extension');

		return new RetsRabbit_Twig_Extension;
	}
}