<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;

class CustomerController extends Controller
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
        return view('customer.index');
    }

    public function create()
    {
        return view('customer.form');
    }

    public function store(Request $request)
    {
        $store = new Customer();
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->enabled = 1;
        $store->save();

        return redirect()->route('customer')->with('success', 'Berhasil tambah produk!');
    }

    public function edit($id)
    {
        $data = Customer::findOrFail($id);

        return view('customer.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $store = Customer::findOrFail($id);
        $store->name = $request->name;
        $store->phone = $request->phone;
        $store->address = $request->address;
        $store->enabled = 1;
        $store->save();

        return redirect()->route('customer')->with('success', 'Berhasil tambah produk!');
    }
}
