<?php

namespace Anecka\RetsRabbit\Transformers;

use League\Fractal\TransformerAbstract;

class PropertyTransformer extends TransformerAbstract
{
    /**
     * @var array
     */
    protected $availableIncludes = array('photos');

    /**
     * @var array
     */
    protected $defaultIncludes = array('photos');

    /**
     * @param  $listing array
     * @return array|null
     */
    public function transform($listing = array())
    {
        $data = $listing;
        $data['has_photos'] = false;
        $data['total_photos'] = 0;

        if(isset($data['listing']) && isset($data['listing']['photos'])) {
            $count = sizeof($data['listing']['photos']);
            if($count) {
                $data['has_photos'] = true;
                $data['total_photos'] = $count;
            }
        }

        return $data;
    }

    /**
     * @param  array
     * @return array
     */
    public function includePhotos($listing = array())
    {   $photos = array();

        if(isset($listing['listing']) && isset($listing['listing']['photos']))
            $photos = $listing['listing']['photos'];

        return $this->collection($photos, new PhotoTransformer);
    }
}