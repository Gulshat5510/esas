<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class About extends Model
{
    use HasTranslations;

    protected $fillable = ['filename', 'desc'];
    public $translatable = ['desc'];

    public function getImage()
    {
        return asset('uploads/about/' . $this->filename);
    }
}
