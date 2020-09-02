<?php

namespace App;

use Jenssegers\Mongodb\Eloquent\Model;

//use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    protected $connection = 'mongodb';
}
