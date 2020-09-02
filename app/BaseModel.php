<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection = 'mongodb';
}
