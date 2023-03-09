<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SubCategory extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'categories_id', 'code', 'code_sub', 'name_subcategory', 'slug'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function goods()
    {
        return $this->hasMany(Good::class, 'sub_categories_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->code_sub = $model->category->code . $model->code;
        });
    }
}
