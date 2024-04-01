<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class BidderSlot extends BaseModel
{
    protected $table = 'bidder_slot';

    protected $fillable = [
        'bidder',
        'slot',
        'select',
        'track',
        'total_price',
    ];

    public function slots(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Slot::class,
                'prices',
                'bidder_slot_id',
                'slot',
                'id',
                'name_slug'
            )
            ->withPivot(['price'])
            ->withTimestamps();
    }
}
