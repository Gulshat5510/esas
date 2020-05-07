<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Category extends Model
{
    use HasTranslations;

    protected $fillable = ['slug', 'name'];
    public $translatable = ['name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_categories');
    }
}
