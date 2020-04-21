<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    protected $fillable = ['project_id', 'type', 'filename', 'order'];

    public function project()
    {
        return $this->belongsTo(Project::class);
    }

    public function getImage()
    {
        return asset('uploads/projects/' . $this->filename);
    }
}
