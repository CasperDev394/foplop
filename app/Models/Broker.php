<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;

class Broker extends BaseModel
{
    protected $fillable = [
        'name',
        'name_slug',
        'site',
        'img',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'entity');
    }
}
