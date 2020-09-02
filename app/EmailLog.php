<?php

namespace App;

class EmailLog extends BaseModel
{
    protected $guarded = [];

    public function __construct($attributes = [])
    {
        parent::__construct($attributes);

        if (isset($attributes['collection'])) {
            $this->collection = 'email_logs_site_' . $attributes['collection'];
        }
    }
}
