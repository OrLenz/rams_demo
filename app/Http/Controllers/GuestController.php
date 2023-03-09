<?php

namespace App\Http\Controllers;

use App\Models\DamagedGood;
use App\Models\Good;
use App\Models\GoodEntry;
use App\Models\GoodLoan;
use App\Models\GoodOut;
use App\Models\Warehouse;
use Illuminate\Http\Request;

class GuestController extends Controller
{
    public function index(Request $request)
    {
        return view('pages.user', [
            'goods' => Good::count(),
            'goods_entry' => GoodEntry::count(),
            'goods_out' => GoodOut::count(),
            'warehouse' => Warehouse::count(),
            'goods_loan' => GoodLoan::where('status', 'DIPINJAM')->count(),
            'damaged_goods' => DamagedGood::where('condition', 'RUSAK')->count()
        ]);
    }
}
