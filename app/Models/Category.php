<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Intervention\Image\Facades\Image;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',

    ];

    // public function setImageAttribute($value)
    // {
    //     $image = Image::make($value);
    //     $image->resize(300, null, function ($constraint) {
    //         $constraint->aspectRatio();
    //     });
    //     $path = public_path('images/' . time() . $value->getClientOriginalName());
    //     $image->save($path);
    //     $this->attributes['image'] = $path;
    // }
}
