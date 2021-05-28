<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{
    use HasTranslations;

    protected $fillable = ['slug', 'data', 'locale_data', 'is_social'];
    public $translatable = ['locale_data'];
}
