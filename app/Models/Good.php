<?php

namespace App\Models;

use App\Http\Controllers\WarehouseController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Good extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'code', 'code_good', 'categories_id', 'sub_categories_id',
        'stuff', 'slug', 'unit', 'employees_id', 'chart_of_accounts_id',
        'detail', 'code_num', 'source_of_funds', 'price'
    ];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_categories_id', 'id');
    }

    public function chart_of_account()
    {
        return $this->belongsTo(ChartOfAccount::class, 'chart_of_accounts_id', 'id');
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employees_id', 'id');
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class, 'goods_id', 'id');
    }

    public function warehouses()
    {
        return $this->hasMany(WarehouseController::class, 'goods_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->code = $model->code_num;


            if ($model->sub_categories_id && $model->code_num < 10 && $model->code_num > 0) {
                $model->code_good = $model->sub_category->code_sub . '000' . $model->code;
            } elseif ($model->sub_categories_id && $model->code_num < 100 && $model->code_num >= 10) {
                $model->code_good = $model->sub_category->code_sub . '00' . $model->code;
            } elseif ($model->sub_categories_id && $model->code_num < 1000 && $model->code_num >= 100) {
                $model->code_good = $model->sub_category->code_sub . '0' . $model->code;
            } elseif ($model->sub_categories_id && $model->code_num < 10000 && $model->code_num >= 1000) {
                $model->code_good = $model->sub_category->code_sub . '' . $model->code;
            }
        });
    }
}
