<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Payment extends BaseModel
{
    protected $fillable = [
        'price',
        'tariff',
        'dateFrom',
        'dateTill',
    ];

    const TARIFF_ONLY = 'ONLY';
    const TARIFF_CUSTOM = 'CUSTOM';
    const TARIFF_SUBSCRIPTION = 'SUBSCRIPTION';

    const TARIFFS_NAME = [
        self::TARIFF_ONLY          => 'Одна категория',
        self::TARIFF_CUSTOM         => 'Несколько категорий',
        self::TARIFF_SUBSCRIPTION   => 'Подписка',
    ];

    public function scopeWhereActive($query, $date = null)
    {
        $date = $date ?? today()->format('Y-m-d');
        $query
            ->where('dateFrom', '<=', $date)
            ->where(function ($query) use ($date){
                $query
                    ->Where('dateTill', '>=', $date)
                    ->orWhereNull('dateTill');
            });
    }

    public function bidder(): BelongsTo
    {
        return $this->belongsTo(Bidder::class, 'bidder', 'name_slug');
    }

    public function directions(): BelongsToMany
    {
        return $this->belongsToMany(Direction::class);
    }
}
