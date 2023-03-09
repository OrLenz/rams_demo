<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GoodLoan extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'warehouses_id', 'room_source', 'rooms_id', 'borrower_name', 'loan_stock',
        'date_borrow', 'date_return', 'status', 'slug'
    ];

    protected $hidden = [];

    public function good_entry()
    {
        return $this->belongsTo(GoodEntry::class, 'warehouses_id', 'id');
    }

    public function room()
    {
        return $this->belongsTo(Room::class, 'rooms_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $warehouse = GoodLoan::with('good_entry')
                ->where('room_source', 'good_entry->rooms_id')
                ->where('status', 'DIPINJAM')
                ->whereNull('date_return')
                ->get();

            if ($warehouse) {
                $model->good_entry->last_stock = $model->good_entry->stock - (int) $model->loan_stock;
                $model->good_entry->stock = $model->good_entry->last_stock;
                $model->good_entry->save();
            }
        });

        static::updating(function ($model) {
            $return = GoodLoan::with('good_entry')
                ->where('room_source', 'good_entry->rooms_id')
                ->where('status', 'DIKEMBALIKAN')
                ->whereNotNull('date_return')
                ->get();

            if ($return) {
                $model->good_entry->last_stock = $model->good_entry->stock + (int) $model->loan_stock;
                $model->good_entry->stock = $model->good_entry->last_stock;
                $model->good_entry->save();
            }
        });
    }
}
