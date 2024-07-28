<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'status',
        'cover_image',
        'type_id'



    ];
    // cardinalità project<->type
    // un progetto appartiene a un solo tipo
    public function type()
    {
        return $this->belongsTo(Type::class);
    }



    // cardinalità project<->user
    // un progetto appartiene a un solo utente
    public function user()
    {
        return $this->belongsTo(User::class);
    }



    // cardinalità project<->technology
    // un progetto può avere più tecnologie
    public function technologies()
    {
        return $this->belongsToMany(Technology::class);
    }
}
