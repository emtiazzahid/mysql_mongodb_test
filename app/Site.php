<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Site extends Model
{
    protected $guarded = [];

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
