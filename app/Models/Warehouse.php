<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Warehouse extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'goods_id', 'rooms_id', 'last_stock', 'stock', 'condition', 'slug',
        'suppliers_id', 'price', 'code_goods'
    ];

    protected $hidden = [];

    public function good()
    {
        return $this->belongsTo(Good::class, 'goods_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'rooms_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id', 'id');
    }

    public function good_loans()
    {
        return $this->hasMany(GoodLoan::class, 'warehouses_id', 'id');
    }

    public function good_entries()
    {
        return $this->hasMany(GoodEntry::class, 'warehouses_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($warehouse) {
            $warehouse->last_stock = $warehouse->stock;
        });
    }
}
