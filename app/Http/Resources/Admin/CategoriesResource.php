<?php

namespace App\Http\Resources\Admin;

use App\Models\Direction;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
{
    public function toArray($request): array
    {
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'name_slug'=>$this->resource->name_slug,
            'direction'=>$this->resource->direction,
        ];
    }
}
