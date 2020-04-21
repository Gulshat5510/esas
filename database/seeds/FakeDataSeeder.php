<?php

use Illuminate\Database\Seeder;

class FakeDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Project::create([
            'name' => 'Iki Bürgüt',
            'description' => 'Масштабный ребрендинг крупнейшего ритейлера в России. Логотип сохранил узнаваемый цвет и фирменный знак — букву «М» — и при этом получил современную форму. Он обыгрывает жест рук, воплощающий заботу и внимание. На фасадах, вывесках в торговых залах, упаковке продукции СТМ, информационных и рекламных материалах используется оригинальная система пиктограмм.',
            'client' => 'Knock Knock',
            'year' => '2019'
        ]);

        $project_categories = [
            [
                'project_id' => 8,
                'category_id' => 1
            ],
            [
                'project_id' => 8,
                'category_id' => 2
            ]
        ];

        foreach ($project_categories as $project_category) {
            \App\ProjectCategory::create($project_category);
        }

        $images = [
            [
                'project_id' => 8,
                'type' => 'wide',
                'filename' => 'ULfddkB7ydd8C4wA.png',
                'order' => 1,
            ],
            [
                'project_id' => 8,
                'type' => 'normal',
                'filename' => 'Lzc3grAojRQfpLm4.png',
                'order' => 2,
            ],
            [
                'project_id' => 8,
                'type' => 'normal',
                'filename' => 'Uus8bsOD7MKYWkLh.png',
                'order' => 3,
            ],
            [
                'project_id' => 8,
                'type' => 'wide',
                'filename' => 'DOC16zyHxb5GIrwY.png',
                'order' => 4,
            ],
            [
                'project_id' => 8,
                'type' => 'wide',
                'filename' => 'EiaevpMLDE1XamqA.png',
                'order' => 5,
            ],
        ];

        foreach ($images as $image) {
            \App\Image::create($image);
        }
    }
}
