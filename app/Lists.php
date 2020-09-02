<?php

namespace App;

class Lists extends BaseModel
{
    protected $guarded = [];

    public $incrementing = false;

    protected $collection = 'lists';

    public function subscribers()
    {
        $this->hasMany(ListSubscriber::class);
    }
}
