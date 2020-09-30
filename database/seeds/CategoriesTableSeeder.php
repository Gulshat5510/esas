<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
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
                'slug' => 'strategy',
                'name' => 'Стратегия'
            ],
            [
                'slug' => 'naming',
                'name' => 'Нейминг'
            ],
            [
                'slug' => 'identify',
                'name' => 'Айдентика'
            ],
            [
                'slug' => 'editions',
                'name' => 'Издания'
            ],
            [
                'slug' => 'packaging',
                'name' => 'Упаковка'
            ],
            [
                'slug' => 'environment',
                'name' => 'Дизайн среды'
            ],
        ];

        foreach ($categories as $category) {
            \App\Category::create($category);
        }
    }
}
