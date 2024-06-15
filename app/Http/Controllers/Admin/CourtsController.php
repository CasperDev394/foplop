<?php
namespace App\Http\Controllers\Admin;

use App\Helpers\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CourtResource;
use App\Models\Court;
use App\Models\Debtor;
use App\Models\Slot;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\ResourceCollection;
use Illuminate\Http\Response;

class CourtsController extends Controller
{
    public function getList(): ResourceCollection
    {
        $courts = Court::query()
            ->orderByDesc('created_at')
            ->get();

        return CourtResource::collection($courts);
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->toArray();

        $name_slug = Str::nameSlug([$data['name']], Court::class);

        $court = new Court();
        $court->fill(array_merge($data, ['name_slug'=>$name_slug]));
        $court->save();

        return response()->json(['status'=>'ok']);
    }

    public function update(Court $court, Request $request): JsonResponse
    {
        $data = $request->toArray();
        $court->fill($data);
        $court->save();

        return response()->json(['status'=>'ok']);
    }

    public function delete(Court $court): JsonResponse
    {
        $court->delete();

        return response()->json(['status'=>'ok']);
    }
}
