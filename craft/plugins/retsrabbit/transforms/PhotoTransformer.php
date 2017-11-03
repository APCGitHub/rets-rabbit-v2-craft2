<?php

namespace Anecka\RetsRabbit\Transformers;

use League\Fractal\TransformerAbstract;

class PhotoTransformer extends TransformerAbstract
{
	public function transform($photo = array())
	{
		return $photo;
	}
}