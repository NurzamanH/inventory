<?php

namespace App\Http\Controllers;

use App\Http\Import\ProductImport;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('test.index');
    }

    public function create()
    {
        return view('product.form');
    }

    public function store(Request $request)
    {
        $store = new Product();
        $store->name = $request->name;
        $store->description = $request->description;
        $store->price = $request->price;
        $store->first_price = $request->first_price;
        $store->enabled = 1;
        $store->save();

        return redirect()->route('product')->with('success', 'Berhasil tambah produk!');
    }

    public function edit($id)
    {
        $data = Product::findOrFail($id);

        return view('product.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $store = Product::findOrFail($id);
        $store->name = $request->name;
        $store->description = $request->description;
        $store->price = $request->price;
        $store->first_price = $request->first_price;
        $store->enabled = 1;
        $store->save();

        return redirect()->route('product')->with('success', 'Berhasil tambah produk!');
    }

    public function updateStatus($id, $status)
    {
        $update = Product::findOrFail($id);
        $update->enabled = $status;
        $update->save();
        
        return redirect()->route('product')->with('success', 'Berhasil tambah produk!');
    }

}
