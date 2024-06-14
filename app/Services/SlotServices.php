<?php

namespace App\Services;

use App\Helpers\Str;
use App\Models\Slot;

class SlotServices
{
    protected ?Slot $slot;

    public function __construct(?Slot $slot = null)
    {
        $this->slot = $slot;


    }

    public function create(array $data): Slot
    {
        $name_slug = Str::nameSlug([$data['name']], Slot::class);

        $this->slot = new Slot();
        $this->slot->fill(array_merge($data, ['name_slug'=>$name_slug]));
        $this->slot->published = true;
        $this->slot->save();

        return $this->slot;
    }

    public function update(array $data): Slot
    {
        $this->slot->fill(array_merge($data));
        $this->slot->save();

        return $this->slot;
    }

    public function delete(): void
    {
        $this->slot->delete();
    }
}
