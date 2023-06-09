<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $guarded =[];

    public function places()
    {
        return $this->hasMany(Place::class);
    }

    public function getImageAttribute($image)
    {
        return asset('storage/categories/' . $image);
    }
}
