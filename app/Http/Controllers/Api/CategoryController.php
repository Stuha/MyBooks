<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CategoryResource;
use App\Repositories\CategoryRepository;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function __construct(CategoryRepository $categoryRepository)
    {
        $this->categoryRepository = $categoryRepository;
    }

    public function store(Request $request):CategoryResource
    {
        $category = $this->categoryRepository->create($request);

        return new CategoryResource($category);
    }

    public function show(int $id):CategoryResource
    {
        $category = $this->categoryRepository->find($id);

        return new CategoryResource($category);

    }
}
