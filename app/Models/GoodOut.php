<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodOut extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'warehouses_id', 'rooms_id', 'name_pic', 'quantity',
        'date_of_out', 'slug'
    ];

    protected $hidden = [];

    public function good_entry()
    {
        return $this->belongsTo(GoodEntry::class, 'warehouses_id', 'id');
    }

    // public function room()
    // {
    //     return $this->belongsTo(Room::class, 'rooms_id', 'id');
    // }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $warehouse = GoodOut::with('warehouse')
                ->where('rooms_id', 'warehouse->rooms_id')
                ->whereNotNull('date_of_out')
                ->get();

            if ($warehouse) {
                $model->good_entry->last_stock = $model->good_entry->stock - (int) $model->quantity;
                $model->good_entry->stock = $model->good_entry->last_stock;
                $model->good_entry->save();
            }
        });

        // static::updating(function ($model) {
        //     $return = GoodOut::with('warehouse')
        //         ->where('rooms_id', 'warehouse->rooms_id')
        //         ->where('status', 'DIKEMBALIKAN')
        //         ->whereNotNull('date_return')
        //         ->get();

        //     if ($return) {
        //         $model->warehouse->last_stock = $model->warehouse->stock + (int) $model->loan_stock;
        //         $model->warehouse->stock = $model->warehouse->last_stock;
        //         $model->warehouse->save();
        //     }
        // });
    }
}
