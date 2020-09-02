<?php

namespace App;

class Email extends BaseModel
{
    protected $guarded = [];

    protected $collection = 'emails';

    public function logs()
    {
        return $this->hasMany(EmailLog::class);
    }
}
