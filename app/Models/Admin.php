<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\MorphOne;

class Admin extends BaseModel
{
    protected $fillable = [
        'first_name',
        'last_name',
        'fathers_name',
        'name_slug',
        'sex',
        'birthday',
        'img',
    ];

    public function user(): MorphOne
    {
        return $this->morphOne(User::class, 'entity');
    }
}
