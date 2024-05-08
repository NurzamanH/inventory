<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Inventory;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DB, Cache;
use Illuminate\Support\Facades\Auth;

class PengajuanController extends Controller
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
        return view('transaction.index');
    }

    public function create()
    {
        $product = Inventory::where('enabled', 1)->get();

        return view('transaction.form', compact('product'));
    }

    public function store(Request $request)
    {
        DB::beginTransaction();

        try {

            $trx = new Transaction();
            $trx->user_id = Auth::user()->id;
            $trx->name = $request->name;
            $trx->phone = $request->phone;
            $trx->address = $request->address;
            $trx->transaction_date = \Carbon\Carbon::now();
            $trx->total = $request->total;
            $trx->status = 'Pending';
            $trx->enabled = 1;
            $trx->save();

            foreach ($request->product_id as $key => $row) {
                $product = Inventory::where('id', $row)->first();
                $trxDetail = new TransactionDetail();
                $trxDetail->transaction_id = $trx->id;
                $trxDetail->product_id = $product->id;
                $trxDetail->qty = $request->qty[$key];
                $trxDetail->enabled = 1;
                $trxDetail->save();
            }

            Cache::flush();
            DB::commit();

            toastr()->success('Data berhasil ditambahkan!');

            return redirect()->route('pengajuan');
        } catch (\Throwable $th) {
            DB::rollBack();
            throw $th;
        }
    }

    public function edit($id)
    {
        $data = Inventory::findOrFail($id);

        return view('transaction.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $store = Transaction::findOrFail($id);
        $store->name = $request->name;
        $store->description = $request->description;
        $store->price = $request->price;
        $store->enabled = 1;
        $store->save();

        toastr()->success('Data berhasil diubah!');
        return redirect()->route('pengajuan');
    }

    public function updateStatus($id, $status)
    {
        if ($status == 1) {
            toastr()->info('Data berhasil dipulihkan!');
        } else {
            toastr()->warning('Data berhasil dihapus!');
        }

        $update = Transaction::findOrFail($id);
        $update->enabled = $status;
        $update->save();

        return redirect()->route('pengajuan');
    }

    public function updateStatusPengajuan($id, $status)
    {

        $update = Transaction::findOrFail($id);
        $update->status = $status;
        $update->save();

        toastr()->success('Data berhasil diubah!');
        return redirect()->route('pengajuan');
    }

    public function invoice($id)
    {
        $data = Transaction::findOrFail($id);

        return view('transaction.invoice', compact('data'));
    }

    public function exportPDF($id)
    {
        $data = Transaction::findOrFail($id);

        $pdf = Pdf::loadView('pdf.invoice', compact('data'));
        return $pdf->stream('invoice' . time() . '-.pdf');

    }

}