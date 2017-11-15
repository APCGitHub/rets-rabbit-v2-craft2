<?php

namespace Craft;

class RetsRabbit_Twig_Extension extends \Twig_Extension
{
	public function getTokenParsers()
	{
		return array(
			new RetsRabbit_Paginate_TokenParser
		);
	}
}