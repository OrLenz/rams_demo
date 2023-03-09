<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Room extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'code_rooms_id', 'num_code', 'room_name', 'description', 'slug', 'last_code', 'floor'
    ];

    protected $hidden = [];

    public function code_room()
    {
        return $this->belongsTo(CodeRoom::class, 'code_rooms_id', 'id');
    }

    public function warehouses()
    {
        return $this->hasMany(WarehouseController::class, 'rooms_id', 'id');
    }

    public function good_loans()
    {
        return $this->hasMany(GoodLoan::class, 'rooms_id', 'id');
    }

    public static function boot()
    {
        parent::boot();

        static::saving(function ($item) {
            $item->last_code = $item->code_room->code . $item->floor . $item->num_code;
        });
    }
}
