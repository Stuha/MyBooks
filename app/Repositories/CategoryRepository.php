<?php

namespace App\Repositories;

use App\Models\Category;

class CategoryRepository
{
    public function find($id)
    {
        $category = Category::find($id);

        return $category;
    }

    public function create($data)
    {
        $category = new Category();
        $category->category_name = $data->category_name;
        $category->save();

        return $category;
    }

    public function update($data)
    {
        $category = Category::find($data->id)->update([
            'category_name' => $data->category_name
        ]);

        return $category;
    }
}
