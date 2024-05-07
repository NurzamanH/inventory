<?php

namespace App\Http\Livewire\Report;

use App\Models\Transaction;
use App\Models\TransactionDetail;
use Livewire\Component;
use Livewire\WithPagination;
use DB;

class ListData extends Component
{
    public $search;
    public $searchDates;
    public $startDate;
    public $endDate;

    protected $listeners = [
        'refreshThis' => '$refresh',
        'searchDates',
    ];
    public function searchDates($e)
    {
        $this->searchDates = $e;
    }

    use WithPagination;
    public function render()
    {
        if ($this->searchDates != null) {
            $dates = explode(' - ', $this->searchDates);
            $this->startDate = \Carbon\Carbon::parse($dates[0])->format('Y-m-d');
            $this->endDate = \Carbon\Carbon::parse($dates[1])->format('Y-m-d');
        }else{
            $this->startDate = \Carbon\Carbon::now()->startOfMonth()->toDateString();
            $this->endDate = \Carbon\Carbon::now()->endOfMonth()->toDateString();
        }
        $statsTotalPengajuan  = $this->totalPengajuan();
        $statsTotalPengajuanApprove  = $this->totalPengajuanApprove();
        $statsTotalEmployee  = $this->totalEmployee();
        $data = Transaction::when($this->search, function($query){
                                $query->where('name', 'LIKE', '%'.$this->search.'%');
                                $query->orWhere('phone', 'LIKE', '%'.$this->search.'%');
                            })
                            ->when($this->startDate && $this->endDate , function ($query) {
                                $query->whereDate('transaction_date','>=', $this->startDate);
                                $query->whereDate('transaction_date','<=', $this->endDate);
                            })
                            ->paginate(10);
                        
        if ($this->searchDates != null) {
            $dates = explode(' - ',$this->searchDates);
            $request['start_date'] = \Carbon\Carbon::parse($dates[0])->format('Y-m-d H:i:s');
            $request['end_date'] = \Carbon\Carbon::parse($dates[1])->format('Y-m-d H:i:s');
            $request['dates'] = $this->searchDates;
        }else{
            $request['start_date'] = \Carbon\Carbon::now()->startOfMonth()->toDateString();
            $request['end_date'] = \Carbon\Carbon::now()->endOfMonth()->toDateString();
            $request['dates'] = \Carbon\Carbon::parse($request['start_date'])->format('m/d/Y') .' - '. \Carbon\Carbon::parse($request['end_date'])->format('m/d/Y');

        }
        return view('livewire.report.list-data',[
            'data' => $data,
            'request' => $request,
            'statsTotalPengajuan' => $statsTotalPengajuan,
            'statsTotalPengajuanApprove' => $statsTotalPengajuanApprove,
            'statsTotalEmployee' => $statsTotalEmployee
        ]);
    }

    public function totalPengajuan()
    {
        $data = Transaction::when($this->search, function($query){
                                $query->where('name', 'LIKE', '%'.$this->search.'%');
                                $query->orWhere('phone', 'LIKE', '%'.$this->search.'%');
                            })
                            ->when($this->startDate && $this->endDate , function ($query) {
                                $query->whereDate('transaction_date','>=', $this->startDate);
                                $query->whereDate('transaction_date','<=', $this->endDate);
                            })
                            ->count('transaction.id');
        return $data;
    }

    public function totalPengajuanApprove()
    {
        $data = Transaction::when($this->search, function($query){
                                $query->where('name', 'LIKE', '%'.$this->search.'%');
                                $query->orWhere('phone', 'LIKE', '%'.$this->search.'%');
                            })
                            ->when($this->startDate && $this->endDate , function ($query) {
                                $query->whereDate('transaction_date','>=', $this->startDate);
                                $query->whereDate('transaction_date','<=', $this->endDate);
                            })
                            ->where('transaction.status', 'Approve')
                            ->count('transaction.id');
        return $data;
    }

    public function totalEmployee()
    {
        $data = Transaction::when($this->search, function($query){
                                $query->where('name', 'LIKE', '%'.$this->search.'%');
                                $query->orWhere('phone', 'LIKE', '%'.$this->search.'%');
                            })
                            ->when($this->startDate && $this->endDate , function ($query) {
                                $query->whereDate('transaction_date','>=', $this->startDate);
                                $query->whereDate('transaction_date','<=', $this->endDate);
                            })
                            ->distinct('user_id')
                            ->count('id');
        return $data;
    }
}
