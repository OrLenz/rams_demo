<?php

namespace App\Models;

use DateTime;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodEntry extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'suppliers_id', 'goods_id', 'rooms_id', 'room_name', 'code_goods', 'date_of_entry',
        'stock', 'condition', 'slug', 'warehouses_id', 'useful_life', 'residual_value',
        'accumulated_depreciation', 'net_book_value', 'rate_of_depreciation',
        'depreciation_expense', 'last_stock'
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

    public function good_outs()
    {
        return $this->hasMany(GoodOut::class, 'warehouses_id', 'id');
    }

    public function damaged_goods()
    {
        return $this->hasMany(DamagedGood::class, 'warehouses_id', 'id');
    }

    public function issued_goods()
    {
        return $this->hasMany(IssuedGood::class, 'warehouses_id', 'id');
    }

    // public function warehouseCode()
    // {
    //     return $this->hasOneThrough(
    //         Warehouse::class,
    //         Room::class,
    //         null,
    //         'rooms_id',
    //         'id',
    //         'id'
    //     );
    // }

    public static function boot()
    {
        parent::boot();

        // static::creating(function ($model) {
        //     $model->code_goods = $model->good->code_good;
        //     $model->room_name = $model->room->last_code;
        //     // $model->warehouseCode->code_goods = $model->code_goods;
        // });

        static::saving(function ($model) {
            $model->last_stock = $model->stock;

            $model->code_goods = $model->good->code_good;
            $model->room_name = $model->room->last_code;
        });

        // static::updating(function ($item) {
        //     $prev_depreciation = 0;

        //     $item->rate_of_depreciation = 1 - pow(($item->residual_value / $item->good->price), (1 / $item->useful_life));

        //     for ($per = 1; $per <= $item->useful_life; $per++) {
        //         if ($per == 1) {
        //             $item->accumulated_depreciation = $item->good->price * $item->rate_of_depreciation;
        //             $item->net_book_value = $item->accumulated_depreciation;
        //         } else {
        //             $item->accumulated_depreciation = ($item->good->price - $prev_depreciation) * $item->rate_of_depreciation;
        //         }
        //         $prev_depreciation += $item->accumulated_depreciation;
        //     }
        // });
    }
}
