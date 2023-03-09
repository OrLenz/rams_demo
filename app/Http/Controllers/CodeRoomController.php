<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\CodeRoomRequest;
use App\Models\CodeRoom;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CodeRoomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = CodeRoom::paginate(10);

        return view('pages.admin.code_room.index', [
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
        return view('pages.admin.code_room.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CodeRoomRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->code);

        CodeRoom::create($data);

        return redirect()->route('code_room.index');
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
        $item = CodeRoom::findOrFail($id);

        return view('pages.admin.code_room.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CodeRoomRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->code);

        $item = CodeRoom::findOrFail($id);

        $item->update($data);

        return redirect()->route('code_room.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = CodeRoom::findOrFail($id);
        $item->delete();

        return redirect()->route('code_room.index');
    }
}
