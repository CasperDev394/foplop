<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class DebtorResource extends JsonResource
{
    public static $wrap = null;
    public function toArray($request): array
    {
        return [
            'id'=>$this->resource->id,
            'first_name'=>$this->resource->first_name,
            'last_name'=>$this->resource->last_name,
            'fathers_name'=>$this->resource->fathers_name,
            'name'=>$this->resource->full_name,

            'name_slug'=>$this->resource->name_slug,

        ];
    }
}
