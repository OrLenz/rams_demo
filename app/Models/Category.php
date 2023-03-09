<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'code', 'category_name', 'slug'
    ];

    protected $hidden = [];

    public function goods()
    {
        return $this->hasMany(Good::class, 'categories_id', 'id');
    }

    public function sub_categories()
    {
        return $this->hasMany(SubCategory::class, 'categories_id', 'id');
    }
}
