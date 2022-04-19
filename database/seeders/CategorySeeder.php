<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'category_name' => 'Sci-Fi'
            ],
            [
                'category_name' => 'Crime'
            ],
            [
                'category_name' => 'Fantasy'
            ],
            [
                'category_name' => 'Autobiography'
            ],
            [
                'category_name' => 'Historical'
            ],
            [
                'category_name' => 'Scientific'
            ],
            [
                'category_name' => 'Horror'
            ],
        ];

        Category::insert($categories);
    }
}
