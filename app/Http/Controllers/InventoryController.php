<?php

namespace App\Http\Controllers;

use App\Exports\Inventory as ExportsInventory;
use App\Http\Import\ProductImport;
use App\Models\Inventory;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class InventoryController extends Controller
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
        return view('inventories.index');
    }

    public function create()
    {
        return view('inventories.form');
    }

    public function store(Request $request)
    {
        $store = new Inventory();
        $store->name = $request->name;
        $store->description = $request->description;
        $store->qty = $request->qty;
        $store->type = $request->type;
        $store->enabled = 1;
        $store->save();

        return redirect()->route('inventory')->with('success', 'Berhasil tambah produk!');
    }

    public function edit($id)
    {
        $data = Inventory::findOrFail($id);

        return view('inventories.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $store = Inventory::findOrFail($id);
        $store->name = $request->name;
        $store->description = $request->description;
        $store->qty = $request->qty;
        $store->type = $request->type;
        $store->enabled = 1;
        $store->save();

        return redirect()->route('inventory')->with('success', 'Berhasil tambah produk!');
    }

    public function updateStatus($id, $status)
    {
        $update = Inventory::findOrFail($id);
        $update->enabled = $status;
        $update->save();
        
        return redirect()->route('inventory')->with('success', 'Berhasil tambah produk!');
    }

    public function exportExcel(Request $request)
    {
        $data['search'] = $request->search;

        return Excel::download(new ExportsInventory($data), 'Inventory.xlsx');

        return redirect()->back()->with('success', 'Data berhasil diupload.');

    }
}