<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class People extends BaseModel
{
    protected $fillable = [
        'first_name',
        'last_name',
        'fathers_name',
        'name_slug',
        'location',
        'inn',
        'ogrn',
    ];

    public function slots(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Slot::class,
                'people_slot',
                'people',
                'slot',
                'name_slug',
                'name_slug'
            )
            ->withPivot(['role'])->withTimestamps();
    }
}
