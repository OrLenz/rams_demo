<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class IssuedGood extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'warehouses_id', 'rooms_id', 'name_pic', 'quantity', 'detail',
        'date_issued', 'date_fixed', 'condition', 'slug'
    ];

    protected $hidden = [];

    public function good_entry()
    {
        return $this->belongsTo(GoodEntry::class, 'warehouses_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $warehouse = IssuedGood::with('good_entry')
                ->where('rooms_id', 'good_entry->rooms_id')
                ->where('condition', 'BERMASALAH')
                ->whereNull('date_fixed')
                ->get();

            if ($warehouse) {
                $model->good_entry->last_stock = $model->good_entry->stock - (int) $model->quantity;
                $model->good_entry->stock = $model->good_entry->last_stock;
                $model->good_entry->save();
            }
        });

        static::updating(function ($model) {
            $return = IssuedGood::with('good_entry')
                ->where('rooms_id', 'good_entry->rooms_id')
                ->where('condition', 'DIPERBAIKI')
                ->whereNotNull('date_fixed')
                ->get();

            if ($return) {
                $model->good_entry->last_stock = $model->good_entry->stock + (int) $model->quantity;
                $model->good_entry->stock = $model->good_entry->last_stock;
                $model->good_entry->save();
            }
        });
    }
}
