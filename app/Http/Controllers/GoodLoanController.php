<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoodLoanRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\GoodLoan;
use App\Models\GoodEntry;
use Illuminate\Support\Str;
use Carbon\Carbon;


class GoodLoanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $start = Carbon::parse(request('start_date'));
        $end = Carbon::parse(request('end_date'));
        $now_date = Carbon::now();

        if (request('start_date') && request('end_date') && request('department')) {
            $filter_items = GoodLoan::with(['good_entry', 'room'])->whereDate('created_at', '<=', $end)
                ->whereDate('created_at', '>=', $start)
                ->where('rooms_id', 'like', request('department') . '%')->paginate(10);
        } elseif (request('start_date') && request('end_date')) {
            $filter_items = GoodLoan::with(['good_entry', 'room'])->whereDate('created_at', '<=', $end)
                ->whereDate('created_at', '>=', $start)->paginate(10);
        } elseif (request('department')) {
            $filter_items = GoodLoan::with(['good_entry', 'room'])->where('rooms_id', 'like', request('department') . '%');
        } else {
            $filter_items = GoodLoan::with(['good_entry', 'room'])->whereMonth('created_at', $now_date)
                ->paginate(10);
        }

        // $items = GoodLoan::with(['good_entry', 'room'])->paginate(10);

        return view('pages.good_loan.index', [
            'filter_items' => $filter_items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $filter_items = GoodLoan::all();
        $good_entries = GoodEntry::all();
        $rooms = Room::all();
        return view('pages.good_loan.create', [
            'good_entries' => $good_entries,
            'filter_items' => $filter_items,
            'rooms' => $rooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodLoanRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->warehouses_id);

        GoodLoan::create($data);

        return redirect()->route('good_loan.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $filter_items = GoodLoan::findOrFail($id);
        $good_entries = GoodEntry::all();
        $rooms = Room::all();

        return view('pages.good_loan.edit', [
            'good_entries' => $good_entries,
            'filter_items' => $filter_items,
            'rooms' => $rooms
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodLoanRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->warehouses_id);

        $filter_item = GoodLoan::findOrFail($id);

        $filter_item->update($data);

        return redirect()->route('good_loan.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filter_item = GoodLoan::findOrFail($id);
        $filter_item->delete();

        return redirect()->route('good_loan.index');
    }
}
