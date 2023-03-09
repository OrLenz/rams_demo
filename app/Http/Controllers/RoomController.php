<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\RoomRequest;
use App\Models\CodeRoom;
use Illuminate\Http\Request;
use App\Models\Room;
use Illuminate\Support\Str;


class RoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = Room::with(['code_room'])->orderBy('last_code')->paginate(10);

        return view('pages.admin.room.index', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $items = Room::all();
        $code_rooms = CodeRoom::all();
        return view('pages.admin.room.create', [
            'code_rooms' => $code_rooms,
            'items' => $items
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(RoomRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->room_name);

        Room::create($data);

        return redirect()->route('room.index');
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
        $items = Room::findOrFail($id);
        $code_rooms = CodeRoom::all();

        return view('pages.admin.room.edit', [
            'code_rooms' => $code_rooms,
            'items' => $items
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(RoomRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->stuff);

        $item = Room::findOrFail($id);

        $item->update($data);

        return redirect()->route('room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Room::findOrFail($id);
        $item->delete();

        return redirect()->route('room.index');
    }
}
