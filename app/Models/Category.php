<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Category extends BaseModel
{
    protected $table = 'categories';
    protected $fillable = [
        'name',
        'name_slug',
        'direction',
    ];


    public function direction(): BelongsTo
    {
        return $this->belongsTo(Direction::class, 'direction', 'name_slug');
    }

    public function slots(): HasMany
    {
        return $this->hasMany(Slot::class, 'category', 'name_slug');
    }
}
