<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\WarehouseRequest;
use App\Models\Good;
use App\Models\Room;
use Illuminate\Http\Request;
use App\Models\Warehouse;
use Carbon\Carbon;
use Illuminate\Support\Str;


class WarehouseController extends Controller
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
            $filter_items = Warehouse::with(['good', 'room', 'good_loans'])->whereDate('created_at', '<=', $end)
                ->whereDate('created_at', '>=', $start)
                ->where('rooms_id', 'like', request('department') . '%')->paginate(10);
        } elseif (request('start_date') && request('end_date')) {
            $filter_items = Warehouse::with(['good', 'room', 'good_loans'])->whereDate('created_at', '<=', $end)
                ->whereDate('created_at', '>=', $start)->paginate(10);
        } elseif (request('department')) {
            $filter_items = Warehouse::with(['good', 'room', 'good_loans'])->where('rooms_id', 'like', request('department') . '%');
        } else {
            $filter_items = Warehouse::with(['good', 'room', 'good_loans'])->whereMonth('created_at', $now_date)
                ->paginate(10);
        }

        // not used
        // $items = Warehouse::with(['good', 'room', 'good_loans'])->paginate(10);

        return view('pages.warehouse.index', [
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
        $items = Warehouse::all();
        $goods = Good::all();
        $rooms = Room::all();
        return view('pages.warehouse.create', [
            'goods' => $goods,
            'items' => $items,
            'rooms' => $rooms
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(WarehouseRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->goods_id);

        Warehouse::create($data);

        return redirect()->route('warehouse.index');
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
        $items = Warehouse::findOrFail($id);
        $goods = Good::all();
        $rooms = Room::all();

        return view('pages.warehouse.edit', [
            'goods' => $goods,
            'items' => $items,
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
    public function update(WarehouseRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->goods_id);

        $item = Warehouse::findOrFail($id);

        $item->update($data);

        return redirect()->route('warehouse.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Warehouse::findOrFail($id);
        $item->delete();

        return redirect()->route('warehouse.index');
    }
}
