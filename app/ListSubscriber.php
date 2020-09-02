<?php

namespace App;

class ListSubscriber extends BaseModel
{
    protected $guarded = [];

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        if (isset($attributes['collection'])) {
            $this->collection = 'list_subscribers_site_' . $attributes['collection'];
        }
    }
}
