<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Debtor extends BaseModel
{
    protected $fillable = [
        'first_name',
        'last_name',
        'fathers_name',
        'name_slug',
        'inn',
        'ogrn',

    ];

    public function slots(): HasMany
    {
        return $this->hasMany(Slot::class, 'debtor', 'name_slug');
    }

    protected function fullName(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->first_name.' '.$this->last_name.' '.$this->fathers_name
        );
    }
}
