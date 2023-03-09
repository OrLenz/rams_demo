<?php

namespace App\Http\Controllers;

use App\Models\GoodEntry;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReportController extends Controller
{


    public function summary(Request $request)
    {
        $this->validate($request, [
            'start_date' => 'required|date',
            'end_date' => 'required|date|before_or_equal:start_date',
        ]);

        $start = $request->start_date;
        $end = $request->end_date;

        $queries = DB::table('good_entries')->select()
            ->where('date_of_entry', '>=', $start)
            ->where('date_of_entry', '=>', $end)
            ->get();

        return view('pages.report.summary_report.index', compact('queries'));
    }
}
