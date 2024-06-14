<?php

namespace App\Http\Resources\Admin;
use Illuminate\Http\Resources\Json\JsonResource;

class SlotResource extends JsonResource
{
    public static $wrap = null;
    public function toArray($request): array
    {
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'name_slug'=>$this->resource->name_slug,
            'published'=>$this->resource->published,
        ];
    }
}
