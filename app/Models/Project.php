<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    public function images()
    {
        return $this->hasMany(Projectimage::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
}
