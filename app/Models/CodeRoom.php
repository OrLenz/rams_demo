<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CodeRoom extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'code', 'detail', 'slug'
    ];

    protected $hidden = [];

    public function rooms()
    {
        return $this->hasMany(Room::class, 'code_rooms_id', 'id');
    }
}
