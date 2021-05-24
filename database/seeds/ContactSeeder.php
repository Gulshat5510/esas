<?php

use Illuminate\Database\Seeder;
use App\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [
            [
                'slug' => 'address',
                'address' => [
                    'en' => 'Asgabat 10 yyl abadancyly kochesi-47',
                    'tm' => 'Asgabat 10 yyl abadancyly kochesi-47'
                ]
            ],
            [
                'slug' => 'phone',
                'data' => '+993 61 25 65 47'
            ],
            [
                'slug' => 'email',
                'data' => 'gurbanmw@gmail.com'
            ],
            [
                'slug' => 'instagram',
                'data' => 'https://instagram.com/esas',
                'is_social' => true
            ],
            [
                'slug' => 'behance',
                'data' => 'https://behance.com/esas',
                'is_social' => true
            ]
        ];
        foreach ($arr as $item) {
            Contact::create($item);
        }
    }
}
