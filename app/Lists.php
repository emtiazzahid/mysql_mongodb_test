<?php

namespace App;

class Lists extends BaseModel
{
    protected $guarded = [];

    public $incrementing = false;

    public function subscribers()
    {
        $this->hasMany(ListSubscriber::class);
    }

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        if (isset($attributes['collection'])) {
            $this->collection = 'lists_site_' . $attributes['collection'];
        }
    }
}
