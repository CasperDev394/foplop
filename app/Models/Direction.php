<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Direction extends BaseModel
{
    protected $fillable = [
        'name',
        'name_slug',
    ];

    public function categories(): HasMany
    {
        return $this->hasMany(Category::class, 'direction', 'name_slug');
    }

    public function payments(): BelongsToMany
    {
        return $this->belongsToMany(Payment::class);
    }
}
