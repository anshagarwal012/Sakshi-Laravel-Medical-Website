<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reviews extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'path', 'description', 'stars', 'type'];

    // public function getPathAttribute($value)
    // {
    //     if ($value) {
    //         return asset('storage/uploads/' . $value);
    //     }
    //     return null;
    // }
}
