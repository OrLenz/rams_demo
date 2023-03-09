<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\ChartOfAccountRequest;
use App\Models\ChartOfAccount;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class ChartOfAccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = ChartOfAccount::paginate(10);

        return view('pages.admin.chart_of_account.index', [
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
        return view('pages.admin.chart_of_account.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ChartOfAccountRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->account_name);

        ChartOfAccount::create($data);

        return redirect()->route('chart_of_account.index');
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
        $item = ChartOfAccount::findOrFail($id);

        return view('pages.admin.chart_of_account.edit', [
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
    public function update(ChartOfAccountRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->account_name);

        $item = ChartOfAccount::findOrFail($id);

        $item->update($data);

        return redirect()->route('chart_of_account.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = ChartOfAccount::findOrFail($id);
        $item->delete();

        return redirect()->route('chart_of_account.index');
    }
}
