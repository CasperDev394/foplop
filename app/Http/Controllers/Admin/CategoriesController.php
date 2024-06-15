<?php

namespace App\Http\Controllers\Admin;

use App\Helpers\Str;
use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\CategoriesResource;
use App\Http\Resources\Admin\DirectionsResource;
use App\Models\Category;
use App\Models\Direction;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function getList()
    {
        $categories = Category::query()
            ->orderByDesc('created_at')
            ->get();

        return CategoriesResource::collection($categories);
    }

    public function create(Request $request): JsonResponse
    {
        $data = $request->toArray();

        $name_slug = Str::nameSlug([$data['name']], Category::class);

        $category = new Category();
        $category->fill(array_merge($data, ['name_slug'=>$name_slug]));
        $category->save();

        return response()->json(['status'=>'ok']);
    }

    public function update(Category $category, Request $request): JsonResponse
    {
        $data = $request->toArray();

        $category->fill($data);
        $category->save();

        return response()->json(['status'=>'ok']);
    }

    public function delete(Category $category): JsonResponse
    {
        $category->delete();
        return response()->json(['status'=>'ok']);
    }
}
