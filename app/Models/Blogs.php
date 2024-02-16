<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use Carbon\Carbon;

class Blogs extends Model
{
    use HasFactory;
    protected $fillable = ['name', 'category_id', 'image', 'desc', 'long_des', 'slug'];
    protected $with = ['category'];

    public function getImageAttribute($value)
    {
        if ($value) {
            return asset('storage/uploads/' . $value);
        }
        return null;
    }

    public function getCreatedAtAttribute($value)
    {
        // Parse the date with Carbon and format it as desired
        return Carbon::parse($value)->format('d F Y');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }
    
}
