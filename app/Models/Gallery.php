<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    use HasFactory;
    protected $fillable = ['type', 'images'];

    // public function getImageAttribute($value)
    // {
    //     if ($value) {
    //         return asset('storage/uploads/' . $value);
    //     }
    //     return null;
    // }
}
