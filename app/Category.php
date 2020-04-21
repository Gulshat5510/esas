<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['slug', 'name'];

    public function projects()
    {
        return $this->belongsToMany(Project::class, 'project_categories');
    }
}
