<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Slot extends BaseModel
{
    protected $fillable = [
        'name',
        'name_slug',
        'published',
        'debtor',
        'link',
        'location',
        'documents',
        'court_id',
        'case_number',
        'category',
        'broker',
    ];

    protected $casts = [
        'published'    => 'boolean', // tinyint(1)
        'documents' => 'array',
    ];

    public function peoples(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                People::class,
                'people_slot',
                'slot',
                'people',
                'name_slug',
                'name_slug'
            )
            ->withPivot(['role'])->withTimestamps();
    }

    public function bidders(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                Bidder::class,
                'bidder_slot',
                'slot',
                'bidder',
                'name_slug',
                'name_slug'
            )
            ->withPivot(['select', 'track', 'total_price'])
            ->withTimestamps();
    }

    public function bidderSlots(): BelongsToMany
    {
        return $this
            ->belongsToMany(
                BidderSlot::class,
                'prices',
                'slot',
                'bidder_slot_id',
                'name_slug',
                'id'
            )
            ->withPivot(['price'])
            ->withTimestamps();
    }

    public function court(): BelongsTo
    {
        return $this->belongsTo(Court::class);
    }

    public function debtor(): BelongsTo
    {
        return $this->belongsTo(Debtor::class, 'debtor', 'name_slug');
    }

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class, 'category', 'name_slug');
    }

    public function broker(): BelongsTo
    {
        return $this->belongsTo(Broker::class, 'broker', 'name_slug');
    }
}
