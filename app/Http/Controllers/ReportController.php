<?php

namespace App\Http\Controllers;

use App\Exports\Report;
use App\Models\Customer;
use App\Models\Product;
use App\Models\Transaction;
use App\Models\TransactionDetail;
use Illuminate\Http\Request;
use Barryvdh\DomPDF\Facade\Pdf;
use DB, Cache;
use Maatwebsite\Excel\Facades\Excel;

class ReportController extends Controller
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
        return view('report.index');
    }

    public function invoice($id)
    {
        $data = Transaction::findOrFail($id);

        return view('report.invoice', compact('data'));
    }

    public function exportPDF($id)
    {
        $data = Transaction::findOrFail($id);

        $pdf = Pdf::loadView('pdf.invoice', compact('data'));
        return $pdf->stream('invoice'.time().'-.pdf');

    }

    public function exportExcel(Request $request)
    {
        $data['search'] = $request->search;

        return Excel::download(new Report($data), 'Report.xlsx');

        return redirect()->back()->with('success', 'Data berhasil diupload.');

    }
    
}
