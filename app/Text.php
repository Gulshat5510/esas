<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Text extends Model
{
    use HasTranslations;

    protected $fillable = ['description'];
    public $translatable = ['description'];
}
