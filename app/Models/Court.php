<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;

class Court extends BaseModel
{
    protected $fillable = [
        'name',
        'name_slug',
    ];


    public function slots(): HasMany
    {
        return $this->hasMany(Slot::class);
    }
}
