<?php

namespace App\Providers;

use App\Contact;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $global_arr = [
            'phone' => null,
            'email' => null,
            'instagram' => null,
            'behance' => null,
            'copyright' => null
        ];

        if (Schema::hasTable('contacts')) {
            $global_arr = [
                'phone' => Contact::whereSlug('phone')->firstOrFail()->data,
                'email' => Contact::whereSlug('email')->firstOrFail()->data,
                'instagram' => Contact::whereSlug('instagram')->firstOrFail()->data,
                'behance' => Contact::whereSlug('behance')->firstOrFail()->data,
                'copyright' => Contact::whereSlug('copyright')->firstOrFail()->locale_data,
            ];
        }

        View::share('global_arr', $global_arr);
    }
}
