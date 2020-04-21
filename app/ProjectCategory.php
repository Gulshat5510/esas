<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ProjectCategory extends Model
{
    protected $fillable = ['project_id', 'category_id'];
    public $timestamps = false;
}
