<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\SlotResource;
use App\Models\Slot;
use App\Services\SlotServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class SlotsController extends Controller
{
    public function getList(): ResourceCollection
    {
        $slots = Slot::query()
            ->orderByDesc('created_at')
            ->get();

        return SlotResource::collection($slots);
    }

    public function create(Request $request): JsonResponse
    {

        (new SlotServices())->create($request->toArray());

        return response()->json(['status'=>'ok']);
    }

    public function read(Slot $slot): SlotResource
    {
        return new SlotResource($slot);
    }

    public function update(Request $request, Slot $slot): JsonResponse
    {
        (new SlotServices($slot))->update($request->toArray());

        return response()->json(['status'=>'ok']);
    }

    public function delete(Slot $slot): JsonResponse
    {
        (new SlotServices($slot))->delete();

        return response()->json(['status'=>'ok']);
    }

}
