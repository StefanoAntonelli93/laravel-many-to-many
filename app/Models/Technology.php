<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Technology extends Model
{
    use HasFactory;

    // cardinalità project<->technology
    // una tecnologia può appartenere a più progetti
    public function projects()
    {
        return $this->belongsToMany(Project::class);
    }
}
