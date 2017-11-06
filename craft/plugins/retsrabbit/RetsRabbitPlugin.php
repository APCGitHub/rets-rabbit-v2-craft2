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
		return craft()->templates->render('retsrabbit/_settings', array(
           'settings' => $this->getSettings()
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

		$valid = craft()->retsRabbit_tokens->isValid();

		if(!$valid) {
			craft()->retsRabbit_tokens->refresh();
		}
	}
}