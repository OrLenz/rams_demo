<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Gallery extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'goods_id', 'image'
    ];

    protected $hidden = [];

    public function good()
    {
        return $this->belongsTo(Good::class, 'goods_id', 'id');
    }
}
