<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Contact extends Model
{
    use HasTranslations;
    protected $fillable = ['slug', 'data', 'address', 'is_social'];
    public $translatable = ['address'];
}
