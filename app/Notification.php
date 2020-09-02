<?php

namespace App;

class Notification extends BaseModel
{
    protected $guarded = [];

    public $incrementing = false;

    protected $collection = 'notifications';
}
