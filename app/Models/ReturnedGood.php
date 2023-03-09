<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ReturnedGood extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'warehouses_id', 'rooms_id', 'suppliers_id', 'name_pic', 'quantity', 'detail',
        'date_return', 'date_received', 'status', 'slug'
    ];

    protected $hidden = [];

    public function good_entry()
    {
        return $this->belongsTo(GoodEntry::class, 'warehouses_id', 'id');
    }

    public function supplier()
    {
        return $this->belongsTo(Supplier::class, 'suppliers_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $warehouse = ReturnedGood::with('good_entry')
                ->where('rooms_id', 'good_entry->rooms_id')
                ->where('status', 'DIKEMBALIKAN')
                ->whereNull('date_received')
                ->get();

            if ($warehouse) {
                $model->good_entry->last_stock = $model->good_entry->stock - (int) $model->quantity;
                $model->good_entry->stock = $model->good_entry->last_stock;
                $model->good_entry->save();
            }
        });

        static::updating(function ($model) {
            $return = ReturnedGood::with('good_entry')
                ->where('rooms_id', 'good_entry->rooms_id')
                ->where('status', 'DITERIMA')
                ->whereNotNull('date_received')
                ->get();

            if ($return) {
                $model->good_entry->last_stock = $model->good_entry->stock + (int) $model->quantity;
                $model->good_entry->stock = $model->good_entry->last_stock;
                $model->good_entry->save();
            }
        });
    }
}
