<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;

class Bidder extends BaseModel
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

    public function payments(): HasMany
    {
        return $this->hasMany(Payment::class, 'bidder', 'name_slug');
    }
}
