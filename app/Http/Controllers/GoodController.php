<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\GoodRequest;
use App\Models\Category;
use App\Models\ChartOfAccount;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\Good;
use App\Models\SubCategory;
use Illuminate\Support\Str;


class GoodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $items = Good::with(['category', 'sub_category', 'chart_of_account', 'employee'])->paginate(10);

        if (request('search')) {
            $items = Good::with(['category', 'sub_category', 'chart_of_account', 'employee'])
                ->where('stuff', 'like', '%' . request('search') . '%')->paginate(10);
        } else {
            $items = Good::with(['category', 'sub_category', 'chart_of_account', 'employee'])
                ->paginate(10);
        }

        return view('pages.admin.good.index', [
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
        $items = Good::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $employees = Employee::all();
        $chart_of_accounts = ChartOfAccount::all();
        return view('pages.admin.good.create', [
            'categories' => $categories,
            'items' => $items,
            'sub_categories' => $sub_categories,
            'employees' => $employees,
            'chart_of_accounts' => $chart_of_accounts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(GoodRequest $request)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->stuff);

        Good::create($data);

        return redirect()->route('good.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        // $qrcode = Good::findOrFail($id);

        // return view('pages.admin.good.qrcode', [
        //     'qrcode' => $qrcode
        // ]);

        $items = Good::findOrFail($id);

        return view('pages.admin.good.detail', [
            'items' => $items
        ]);
    }

    // public function detail($id)
    // {
    //     $items = Good::findOrFail($id);

    //     return view('pages.admin.good.detail', [
    //         'items' => $items
    //     ]);
    // }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = Good::findOrFail($id);
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $employees = Employee::all();
        $chart_of_accounts = ChartOfAccount::all();

        return view('pages.admin.good.edit', [
            'categories' => $categories,
            'items' => $items,
            'sub_categories' => $sub_categories,
            'employees' => $employees,
            'chart_of_accounts' => $chart_of_accounts
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(GoodRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->stuff);

        $item = Good::findOrFail($id);

        $item->update($data);

        return redirect()->route('good.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Good::findOrFail($id);
        $item->delete();

        return redirect()->route('good.index');
    }
}
