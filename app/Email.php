<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Jenssegers\Mongodb\Eloquent\HybridRelations;

class Email extends Model
{
    use HybridRelations;

    protected $connection = 'mysql';

    protected $guarded = [];

    public function logs()
    {
        return $this->hasMany(new EmailLog(['collection' => $this->site_id]));
    }
}
