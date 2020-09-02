<?php

namespace App;

class Site extends BaseModel
{
    protected $guarded = [];

    protected $collection = 'sites';

    public function subscribers()
    {
        return $this->hasMany(Subscriber::class);
    }

    public function lists()
    {
        return $this->hasMany(Lists::class);
    }

    public function listSubscribers()
    {
        return $this->hasMany(ListSubscriber::class);
    }

    public function emails()
    {
        return $this->hasMany(Email::class);
    }


}
