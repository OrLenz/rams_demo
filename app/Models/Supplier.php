<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Supplier extends Model
{
    use SoftDeletes;
    use HasFactory;

    protected $fillable = [
        'supplier_name', 'email', 'phone', 'address', 'slug'
    ];

    protected $hidden = [];

    public function returned_goods()
    {
        return $this->hasMany(ReturnedGood::class, 'suppliers_id', 'id');
    }

    public function good_entries()
    {
        return $this->hasMany(GoodEntry::class, 'suppliers_id', 'id');
    }

    public function warehouses()
    {
        return $this->hasMany(Warehouse::class, 'suppliers_id', 'id');
    }

    public function purchase_requests()
    {
        return $this->hasMany(PurchaseRequest::class, 'suppliers_id', 'id');
    }
}
