<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Spatie\Translatable\HasTranslations;

class Project extends Model
{
    use HasTranslations;

    protected $fillable = ['name', 'description', 'cover', 'order', 'is_selected'];
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

    public function getCoverImage()
    {
        return asset('uploads/projects/' . $this->cover);
    }

    public function getFirstCategoryName()
    {
        return $this->categories()->first()->name;
    }

    public function summary300()
    {
        $description = $this->description;
        $description = strip_tags($description);
        $description = html_entity_decode($description);
        $description = trim($description, "\t\n\r\0\x0B\xC2\xA0");
        $description = Str::limit($description, 300);

        return $description;
    }

    public function clientSummary300()
    {
        $client = $this->client;
        $client = strip_tags($client);
        $client = html_entity_decode($client);
        $client = trim($client, "\t\n\r\0\x0B\xC2\xA0");
        $client = Str::limit($client, 300);

        return $client;
    }
}
