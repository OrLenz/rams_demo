<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Http\Requests\PurchaseRequestRequest;
use App\Models\Category;
use App\Models\ChartOfAccount;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Models\PurchaseRequest;
use App\Models\SubCategory;
use App\Models\Supplier;
use Illuminate\Support\Str;
use Carbon\Carbon;


class PurchaseRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $filter_items = PurchaseRequest::with(['category', 'sub_category', 'supplier'])->paginate(10);

        return view('pages.purchase.request.index', [
            'filter_items' => $filter_items
        ]);
    }

    public function order()
    {
        $filter_items = PurchaseRequest::with(['category', 'sub_category', 'supplier'])->paginate(10);

        return view('pages.purchase.order.index', [
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
        $items = PurchaseRequest::all();
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $suppliers = Supplier::all();
        return view('pages.purchase.request.create', [
            'categories' => $categories,
            'items' => $items,
            'sub_categories' => $sub_categories,
            'suppliers' => $suppliers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PurchaseRequestRequest $request)
    {
        $suppliers = $request->suppliers_id;
        $stuff = $request->stuff;
        $description = $request->description;
        $qty = $request->qty;
        $unit = $request->unit;
        $price = $request->price;
        $total = $request->total;
        $subtotal = $request->subtotal;
        $discount = $request->discount;
        $tax = $request->tax;
        $grand_total = $request->grand_total;
        $note = $request->note;
        $status = $request->status;

        $data = array();

        $now = Carbon::now();

        $data = [
            'suppliers_id' => $suppliers,
            'stuff' => $stuff,
            'description' => $description,
            'qty' => $qty,
            'unit' => $unit,
            'price' => $price,
            'total' => $total,
            'subtotal' => $subtotal,
            'discount' => $discount,
            'tax' => $tax,
            'grand_total' => $grand_total,
            'note' => $note,
            'status' => $status,
            'created_at' => $now,
            'updated_at' => $now,
            'slug' => $suppliers
        ];

        PurchaseRequest::insert($data);

        return redirect()->route('request.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $qrcode = PurchaseRequest::findOrFail($id);

        return view('pages.purchase.request.qrcode', [
            'qrcode' => $qrcode
        ]);
    }

    public function detail()
    {
        $items = PurchaseRequest::all();

        return view('pages.purchase.request.detail', [
            'items' => $items
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $items = PurchaseRequest::findOrFail($id);
        $categories = Category::all();
        $sub_categories = SubCategory::all();
        $employees = Employee::all();
        $chart_of_accounts = ChartOfAccount::all();

        return view('pages.purchase.request.edit', [
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
    public function update(PurchaseRequestRequest $request, $id)
    {
        $data = $request->all();
        $data['slug'] = Str::slug($request->stuff);

        $item = PurchaseRequest::findOrFail($id);

        $item->update($data);

        return redirect()->route('request.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = PurchaseRequest::findOrFail($id);
        $item->delete();

        return redirect()->route('request.index');
    }
}
