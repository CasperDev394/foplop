<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Resources\Json\JsonResource;

class BrokerResource extends JsonResource
{
    public static $wrap = null;
    public function toArray($request): array
    {
        return [
            'id'=>$this->resource->id,
            'name'=>$this->resource->name,
            'name_slug'=>$this->resource->name_slug,
            'site'=>$this->resource->site,
            'img'=>$this->resource->img,
            'email'=>$this->user->email,
        ];
    }
}
