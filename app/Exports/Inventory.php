<?php

namespace App\Exports;

use App\Models\Contact;
use App\Models\Inventory as ModelsInventory;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithTitle;
use Throwable, DB;

class Inventory implements FromView, ShouldAutoSize, WithTitle
{
    use Exportable;

    protected $id;

    protected $request;

    // private $writerType = 'xlsx';

    public function __construct($request)
    {
        $this->request = $request;
    }


    public function view(): View
    {
        
        $data = ModelsInventory::when($this->request['search'],function($query, $search) {
                            $query->where(function($query) use ($search){
                                $query->where('name','like','%'.$search.'%');
                                $query->orWhere('phone','like','%'.$search.'%');
                                $query->orWhere('email','like','%'.$search.'%');
                            });
                        })
                        ->get();
        
        return view('excel.inventory.list', [
            'data' => $data,
        ]);
    }

    public function title(): string
    {
        return 'Data Transaksi';
    }
}
