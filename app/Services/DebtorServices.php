<?php

namespace App\Services;

use App\Helpers\Str;
use App\Models\Debtor;
use App\Models\Slot;

class DebtorServices
{
    protected ?Debtor $debtor;

    public function __construct(?Debtor $debtor = null)
    {
        $this->debtor = $debtor;
    }


    public function create(array $data): Debtor
    {
        $name_slug = Str::nameSlug([$data['first_name'], $data['last_name']??'', $data['fathers_name']??''], Slot::class);

        $this->debtor = new Debtor();
        $this->debtor->fill(array_merge($data, ['name_slug'=>$name_slug]));
        $this->debtor->save();

        return $this->debtor;
    }

    public function update(array $data): Debtor
    {
        $this->debtor->fill(array_merge($data));
        $this->debtor->save();

        return $this->debtor;
    }

    public function delete(): void
    {
        $this->debtor->delete();
    }
}
