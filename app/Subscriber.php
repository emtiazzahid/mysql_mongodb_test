<?php

namespace App;

class Subscriber extends BaseModel
{
    protected $guarded = [];

    public $incrementing = false;

    protected $collection = 'subscribers';

    public function lists()
    {
        return $this->hasMany(ListSubscriber::class);
    }
}
