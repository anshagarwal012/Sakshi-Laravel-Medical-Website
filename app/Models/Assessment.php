<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assessment extends Model
{
    use HasFactory;
    public $table = 'assessment';
    protected $fillable = ['form_data', 'created_at', 'updated_at'];
}
