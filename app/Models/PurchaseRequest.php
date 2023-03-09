<?php

namespace App\Models;

use App\Http\Controllers\WarehouseController;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PurchaseRequest extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'no_request', 'suppliers_id', 'stuff', 'description', 'slug', 'unit',
        'note', 'subtotal', 'discount', 'disc', 'status', 'qty', 'price', 'total',
        'tax', 'taxI', 'grand_total'
    ];

    protected $guarded = [];

    protected $hidden = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'categories_id', 'id');
    }

    public function sub_category()
    {
        return $this->belongsTo(SubCategory::class, 'sub_categories_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $model->no_request = str_pad($model->id + 1, 4, "0", STR_PAD_LEFT);
        });
    }
}
