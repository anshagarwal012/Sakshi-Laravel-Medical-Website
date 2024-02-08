<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Blogs extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'image', 'desc', 'long_des'];
    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('storage/uploads/' . $value);
        }
        return null;
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
}
