<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoodOutRequest;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\GoodOut;
use App\Models\GoodEntry;
use Illuminate\Support\Str;
use Carbon\Carbon;


class GoodOutController extends Controller
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
            $filter_items = GoodOut::with(['good_entry'])->whereDate('created_at', '<=', $end)
                ->whereDate('created_at', '>=', $start)
                ->where('rooms_id', 'like', request('department') . '%')->paginate(10);
        } elseif (request('start_date') && request('end_date')) {
            $filter_items = GoodOut::with(['good_entry'])->whereDate('created_at', '<=', $end)
                ->whereDate('created_at', '>=', $start)->paginate(10);
        } elseif (request('department')) {
            $filter_items = GoodOut::with(['good_entry'])->where('rooms_id', 'like', request('department') . '%');
        } else {
            $filter_items = GoodOut::with(['good_entry'])->whereMonth('created_at', $now_date)
                ->paginate(10);
        }

        //$items = GoodOut::with(['warehouse'])->paginate(10);

        return view('pages.good_out.index', [
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
        $filter_items = GoodOut::all();
        $good_entries = GoodEntry::all();
        return view('pages.good_out.create', [
            'good_entries' => $good_entries,
            'filter_items' => $filter_items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodOutRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->warehouses_id);

        GoodOut::create($data);

        return redirect()->route('good_out.index');
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
        $filter_items = GoodOut::findOrFail($id);
        $good_entries = GoodEntry::all();

        return view('pages.good_out.edit', [
            'good_entries' => $good_entries,
            'filter_items' => $filter_items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodOutRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->warehouses_id);

        $filter_item = GoodOut::findOrFail($id);

        $filter_item->update($data);

        return redirect()->route('good_out.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $filter_item = GoodOut::findOrFail($id);
        $filter_item->delete();

        return redirect()->route('good_out.index');
    }
}
