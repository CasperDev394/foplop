<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\DebtorResource;
use App\Models\Debtor;
use App\Services\DebtorServices;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;

class DebtorsController extends Controller
{
    public function getList(): ResourceCollection
    {
        $slots = Debtor::query()
            ->orderByDesc('created_at')
            ->get();

        return DebtorResource::collection($slots);
    }

    public function read(Debtor $debtor): DebtorResource
    {
        return new DebtorResource($debtor);
    }

    public function create(Request $request): JsonResponse
    {
        (new DebtorServices())->create($request->toArray());

        return response()->json(['status'=>'ok']);
    }

    public function update(Request $request, Debtor $debtor): JsonResponse
    {
        (new DebtorServices($debtor))->update($request->toArray());

        return response()->json(['status'=>'ok']);
    }

    public function delete(Debtor $debtor): JsonResponse
    {
        (new DebtorServices($debtor))->delete();

        return response()->json(['status'=>'ok']);
    }
}
