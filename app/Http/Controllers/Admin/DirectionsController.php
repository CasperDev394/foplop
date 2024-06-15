<?php

namespace App\Http\Controllers\Admin;


use App\Helpers\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\DirectionsResource;
use App\Models\Court;
use App\Models\Direction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DirectionsController extends Controller
{
    public function getList(): ResourceCollection
    {
        $directions = Direction::query()
            ->orderByDesc('created_at')
            ->get();

        return DirectionsResource::collection($directions);
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->toArray();

        $name_slug = Str::nameSlug([$data['name']], Direction::class);

        $court = new Direction();
        $court->fill(array_merge($data, ['name_slug'=>$name_slug]));
        $court->save();

        return response()->json(['status'=>'ok']);
    }

    public function update(Direction $direction, Request $request): JsonResponse
    {
        $data = $request->toArray();
        $direction->fill($data);
        $direction->save();

        return response()->json(['status'=>'ok']);
    }

    public function delete(Direction $direction): JsonResponse
    {
        $direction->delete();

        return response()->json(['status'=>'ok']);
    }
}
