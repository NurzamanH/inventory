<?php

namespace App\Http\Controllers;

use App\Http\Import\AttendanceImport;
use App\Models\Attendance;
use App\Models\Customer;
use App\Models\Product;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class AttendanceController extends Controller
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
        return view('attendance.index');
    }

    public function create()
    {
        return view('attendance.form');
    }

    public function store(Request $request)
    {
        $store = new Attendance();
        $store->name = $request->name;
        $store->date = $request->date;
        $store->is_late = $request->is_late;
        $store->is_overtime = $request->is_overtime;
        $store->status = $request->status;
        $store->noted = $request->noted;
        $store->save();

        return redirect()->route('attendance')->with('success', 'Berhasil tambah!');
    }

    public function edit($id)
    {
        $data = Attendance::findOrFail($id);

        return view('attendance.form', compact('data'));
    }

    public function update(Request $request, $id)
    {
        $store = Attendance::findOrFail($id);
        $store->name = $request->name;
        $store->date = $request->date;
        $store->status = $request->status;
        $store->is_late = $request->is_late;
        $store->is_overtime = $request->is_overtime;
        $store->noted = $request->noted;
        $store->save();

        return redirect()->route('attendance')->with('success', 'Berhasil edit!');
    }

    public function delete($id)
    {
        $delete = Attendance::findOrFail($id)->delete();

        return redirect()->route('attendance')->with('success', 'Berhasil delete!');
    }

    public function importExcel(Request $request)
    {
        $file = $request->file('files');
        $nama_file = rand().'-'.$file->getClientOriginalName();
        $file->move(public_path('assets/attachments/'), $nama_file);

        Excel::import(new AttendanceImport(), public_path('assets/attachments/'.$nama_file));

        return redirect()->back()->with('success', 'Data berhasil diupload.');

    }
}
