<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;

    protected $fillable = ['name', 'description', 'client', 'year'];
    public $translatable = ['name', 'description'];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'project_categories');
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function imagesOrderBy()
    {
        return $this->images()->orderBy('order')->get();
    }

    public function getFirstImage()
    {
        return asset('uploads/projects/' . $this->images()->first()->filename);
    }

    public function getFirstCategoryName()
    {
        return $this->categories()->first()->name;
    }

    public function summary300()
    {
        $description = trim($this->description, "\t\n\r\0\x0B\xC2\xA0");
        $description = Str::limit($description, 300);

        return $description;
    }
}
