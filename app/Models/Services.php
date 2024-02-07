<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Services extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image', 'description']; 

    public function getImageAttribute($value)
    {
        if ($value) {
            // return Storage::disk('uploads')->url($value);
            return asset('storage/uploads/' . $value);
        }   
        return null;
    }
}
