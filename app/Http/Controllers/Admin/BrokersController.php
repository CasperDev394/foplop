<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\BrokerResource;
use App\Models\Broker;
use App\Services\BrokerService;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class BrokersController extends Controller
{
    public function getList(): ResourceCollection
    {
        $brokers = Broker::query()
            ->orderByDesc('created_at')
            ->get();

        return BrokerResource::collection($brokers);
    }

    public function create(Request $request): JsonResponse
    {
        (new BrokerService())->create($request->toArray());

        return response()->json(['status'=>'ok']);
    }

    public function read(Broker $broker): BrokerResource
    {
        return new BrokerResource($broker);
    }

    public function update(Request $request, Broker $broker): JsonResponse
    {
        (new BrokerService($broker))->update($request->toArray());

        return response()->json(['status'=>'ok']);
    }

    public function delete(Broker $broker): JsonResponse
    {
        (new BrokerService($broker))->delete();

        return response()->json(['status'=>'ok']);
    }
}
