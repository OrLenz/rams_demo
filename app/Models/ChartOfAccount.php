<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChartOfAccount extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'account_code', 'account_name', 'slug'
    ];

    protected $hidden = [];

    public function goods()
    {
        return $this->hasMany(Good::class, 'chart_of_accounts_id', 'id');
    }
}
