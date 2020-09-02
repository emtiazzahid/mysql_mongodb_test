<?php

namespace App;

class Notification extends BaseModel
{
    protected $guarded = [];

    public $incrementing = false;

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        if (isset($attributes['collection'])) {
            $this->collection = 'notifications_site_' . $attributes['collection'];
        }
    }
}
