<?php

namespace App;

class Subscriber extends BaseModel
{
    protected $guarded = [];

    public $incrementing = false;

    public function lists()
    {
        return $this->hasMany(ListSubscriber::class);
    }

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        if (isset($attributes['collection'])) {
            $this->collection = 'subscribers_site_' . $attributes['collection'];
        }
    }
}
